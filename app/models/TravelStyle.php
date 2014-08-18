<?php

class TravelStyle extends Eloquent {

    protected $table = 'travel_styles';
    public $timestamps = false;
    
    public function tours(){
        return $this->belongsToMany('Tour');
    }
}
?>
