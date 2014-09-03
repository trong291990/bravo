<?php

class Tour extends Eloquent {

    const CODE_PREFIX = 'BIT';
    const PHOTO_PATH = 'uploads/tours';
    const PER_PAGE = 15;    
    protected $table = 'tours';
    private static $price_sort = [
        1=>['label'=>'Less than $25','condition'=>'<= 25'],
        2=>['label'=>'$25 -> $50','condition'=>'BETWEEN 25 AND 50'],
        3=>['label'=>'$50 -> $100','condition'=>'BETWEEN 50 AND 100'],
        4=>['label'=>'$100 -> $300','condition'=>'BETWEEN 100 AND 300'],
        5=>['label'=>'$300 -> $500','condition'=>'BETWEEN 300 AND 500'],
        6=>['label'=>'$500 -> $700','condition'=>'BETWEEN 500 AND 700'],
        7=>['label'=>'$700 -> $1000','condition'=>'BETWEEN 700 AND 1000'],
        8=>['label'=>'> $1000','condition'=>'>1000'],
    ];
    private static $duration_sort = [
        1=>['label'=>'4 Days or Less','condition'=>'< 4'],
        2=>['label'=>'One Week','condition'=>'BETWEEN 5 AND 7'],
        3=>['label'=>'One - Two Weeks','condition'=>'BETWEEN 8 AND 14'],
        4=>['label'=>'Longer than two weeks','condition'=>'> 14']
    ];  
    public static function priceSorts(){
        return self::$price_sort;
    }
    public static function durationSorts(){
        return self::$duration_sort;
    }
    public static $rules = array(
        'name' => 'required',
        'price_from' => 'required|numeric',
        'duration' => 'required|integer|min:1',
        'area_id' => 'required',
        'travel_styles' => 'required',
        'places' => 'required',
        'photo' => 'image|required'
    );

    public static function boot() {
        parent::boot();
        static::creating(function($tour) {
                $tour->code = self::nextTourCode();
                });
        static::saving(function($tour) {
                $tour->slug = slug_string($tour->name);
        });
    }

    /**
     * Generate the next tour code
     * Format: <BIT><Year><number>
     * Example: BIT2014000001
     * 
     * @return string
     */
    public static function nextTourCode() {
        $total = self::count() + 1;
        $code = self::CODE_PREFIX . date('Ym') . zero_padding_number($total, 5);
        return $code;
    }

    public static function searchByKeyword($keyword) {
        $query = self::select('*')->with('places','itineraries');
        return $query->orderBy('created_at', 'DESC')->paginate(); 
    }

    public static function loadOrSearch($options = []) {
        $query = self::select('*')->with('area');
        if (isset($options['area_id']) && trim($options['area_id'])) {
            $query = $query->where('area_id', $options['area_id']);
        }
        if (isset($options['keyword']) && trim($options['keyword'])) {
            $keyword = '%' . trim($options['keyword']) . '%';
            $query = $query->where(function($query) use($keyword) {
                        $query->where('name', 'LIKE', $keyword)
                                ->orWhere('code', 'LIKE', $keyword);
                    });
        }
        return $query->orderBy('created_at', 'DESC')->paginate(self::PER_PAGE);
    }

    public function photoUrl($root = null) {
        $relativePath = self::PHOTO_PATH . '/' . $this->id . '/' . $this->photo;
        if (is_null($root)) {
            return asset($relativePath);
        } else {
            return $root . '/' . $relativePath;
        }
    }

    public function area() {
        return $this->belongsTo('Area', 'area_id');
    }

    public function itineraries() {
        return $this->hasMany('Itinerary', 'tour_id');
    }

    public function scopeInCountry($query, $country) {
        return $query->where('country_id', $country->id);
    }

    public function travelStyles() {
        return $this->belongsToMany('TravelStyle');
    }

    public function places() {
        return $this->belongsToMany('Place');
    }

    public function savePhoto($file) {
        $fileName = sanitize_file_name($file->getClientOriginalName());
        $destPath = public_path() . '/' . self::PHOTO_PATH . '/' . $this->id;
        $file->move($destPath, $fileName);
        $this->photo = $fileName;
        $this->save();
    }

    public function saveThumnail($file) {
        $fileName = 'thumbnail_' . $this->id . '_' . sanitize_file_name($file->getClientOriginalName());
        $destPath = public_path() . '/' . self::PHOTO_PATH . '/' . $this->id;
        $file->move($destPath, $fileName);
        $this->thumbnail = $fileName;
        $this->save();
    }

    public function placeIds() {
        $arrIds = array();
        $places = $this->places;
        foreach ($places as $place) {
            $arrIds[] = $place->id;
        }
        return $arrIds;
    }

    public function travelStylesIds() {
        $Ids = array();
        $travelStyles = $this->travelStyles;
        foreach ($travelStyles as $style) {
            $Ids[] = $style->id;
        }
        return $Ids;
    }

    public function completeDelete() {
        $this->itineraries()->delete();
        $this->delete();
    }

}

?>
