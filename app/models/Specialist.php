<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Specialist extends Eloquent implements UserInterface, RemindableInterface {

    use CommentableTrait;

    protected $table = 'specialists';

    const PER_PAGE = 15;
    const AVATAR_PATH = 'uploads/specialists';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'nationality', 'bio', 'languages', 'specialties', 'password'
    ];
    public static $CREATE_RULES = [
        'first_name' => 'required|max:20',
        'last_name' => 'required|max:20',
        'email' => 'required|email|unique:specialists,email|unique:admin_users,email|unique:customers,email',
        'password' => 'required|min:6|confirmed'
    ];

    public static function updateRules($specialist) {
        return [
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'email' => 'required|email|unique:specialists,email, ' . $specialist->id . '|unique:admin_users,email|unique:customers,email'
        ];
    }

    public static function boot() {
        parent::boot();
        static::saving(function($specialist) {
            if (Hash::needsRehash($specialist->password)) {
                $specialist->password = Hash::make($specialist->password);
            }
        });
    }

    public static function loadOrSearch($options) {
        $query = self::select('*');
        if (isset($options['keyword']) && trim($options['keyword'])) {
            $keyword = '%' . trim($options['keyword']) . '%';
            $query = $query->where(function($query) use($keyword) {
                return $query->whereRaw("CONCAT(first_name,' ',last_name) LIKE '" . $keyword . "'")
                                ->orWhere('email', 'LIKE', $keyword);
            });
        }
        return $query->orderBy('created_at', 'DESC')->paginate(self::PER_PAGE);
    }

    public function parameterize() {
        return slug_string($this->first_name . ' ' . $this->last_name) . '-' . $this->id;
    }

    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function newestResponsibleTours($limit) {
        return Tour::withinAreas($this->getAreaIds())
                        ->with('area')
                        ->orderBy('created_at', 'DESC')
                        ->take($limit)
                        ->get();
    }

    public function mostPopularTour() {
        $area_ids = $this->getAreaIds();
        return Tour::mostBookedWithinAreas($area_ids, 1)->first();
    }

    public function parseSpecialties() {
        return explode(',', $this->specialties);
    }

    public function updatePassword($new_password) {
        $this->password = $new_password;
        $this->save();
    }

    public function getAreaIds() {
        return $this->areas()->lists('id');
    }

    public function areas() {
        return $this->belongsToMany('Area', 'specialists_areas', 'specialist_id', 'area_id');
    }

    public function updateAreas($area_ids) {
        $areas = Area::whereIn('id', $area_ids)->lists('id');
        $this->areas()->sync($areas);
    }

    public function avatarURL() {
        if($this->avatar_url) {
            return asset(self::AVATAR_PATH . '/' . $this->id . '/' . $this->avatar_url);
        } else {
            return asset('/images/default_avatar.png');
        }
    }

    /**
     * Update avatar with given a uploaded file
     */
    public function updateAvatar($uploadedFile) {
        if($this->avatar_url) {
            $avatar_file = public_path(self::AVATAR_PATH . '/' . $this->id . '/' . $this->avatar_url);
            if(File::exists($avatar_file)) {
                File::delete($avatar_file);
            }
        }
        $fileName = sanitize_file_name($uploadedFile->getClientOriginalName());
        $relativeDir = self::AVATAR_PATH . '/' . $this->id;
        $uploadedFile->move(public_path() . '/' . $relativeDir, $fileName);
        $this->avatar_url = $fileName;
        $this->save();
    }

    /*
     * Authenticate functions
     */

    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    }

    public function getReminderEmail() {
        return $this->email;
    }

}
