<?php

class Booking extends \Eloquent {
    protected $fillable = ['travel_date','room_type','main_contact','email','contact_number','arrival_date','airline_flight_no','arrival_time','departure_date','departure_flight_no','departure_time','addition_comment','contribute','total','deposit'];

    public static $rules = [];
}