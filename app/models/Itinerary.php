<?php

class Itinerary extends Eloquent {

    protected $table = 'itineraries';
    public $timestamps = false;
    protected $fillable = ['name', 'hotel', 'detail', 'breakfast', 'lunch', 'dinner', 'order'];

    public function hasAnyMeals() {
        return $this->hasBreakfast() || $this->hasLunch() || $this->hasDinner();
    }

    public function hasBreakfast() {
        return !(!($this->breakfast));
    }

    public function hasLunch() {
        return !(!($this->lunch));
    }

    public function hasDinner() {
        return !(!($this->dinner));
    }

    public function mealsInString() {
        $meals = array();
        if ($this->hasBreakfast()) {
            array_push($meals, 'Breakfast');
        }

        if ($this->hasLunch()) {
            array_push($meals, 'Lunch');
        }

        if ($this->hasDinner()) {
            array_push($meals, 'Dinner');
        }
        return implode(' - ', $meals);
    }

}

?>
