<?php

class Itinerary extends Eloquent {

    protected $table = 'itineraries';
    public $timestamps = false;
    protected $fillable = ['name', 'hotel', 'detail', 'breakfast', 'lunch', 'dinner'];
    
}
?>
