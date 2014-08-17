<?php

class PlacePhoto extends Eloquent {

    protected $table = 'place_photos';
    public $timestamps = false;

    public function place() {
        return $this->belongsTo('Place', 'place_id');
    }

}