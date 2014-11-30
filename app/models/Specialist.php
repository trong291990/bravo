<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Specialist extends Eloquent implements UserInterface, RemindableInterface {

    protected $table = 'specialists';
    const PER_PAGE = 15;
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
            'email' => 'required|email|unique:specialists,email, ' .$specialist->id.'|unique:admin_users,email|unique:customers,email',
            'password' => 'required|min:6|confirmed'
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

    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
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