<?php

class Tour extends Eloquent {

    protected $table = 'tours';

    public function country() {
        return $this->belongsTo('Country', 'country_id');
    }

    public function itineraries() {
        return $this->hasMany('Itinerary', 'tour_id');
    }

    public function scopeInCountry($query, $country) {
        return $query->where('country_id', $country->id);
    }

}

?>
