<?php

class Tour extends Eloquent {

    const CODE_PREFIX = 'BIT';
    const PHOTO_PATH = 'uploads/tours';

    protected $table = 'tours';
    public static $rules = array(
        'name' => 'required',
        'price_from' => 'required|numeric',
        'duration' => 'required|integer|min:1',
        'area_id' => 'required'
//        'photo' => 'image|required'
    );

    /**
     * Generate the next tour code
     * Format: <BIT><Year><number>
     * Example: BIT2014000001
     * 
     * @return string
     */
    public static function nextTourCode() {
        $total = self::count() + 1;
        $code = self::CODE_PREFIX . date('Y') . zero_padding_number($total, 6);
        return $code;
    }

    public static function boot() {
        parent::boot();
        static::creating(function($tour) {
                    if (!$tour->slug) {
                        $tour->slug = slug_string($tour->name);
                    }
                    $tour->code = self::nextTourCode();
                });
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
        $fileName = 'thumbnail_'.$this->id.'_'.sanitize_file_name($file->getClientOriginalName());
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
