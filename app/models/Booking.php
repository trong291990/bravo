<?php

class Booking extends \Eloquent {
    const BOOKING_WAITING_STATUS = 0;
    const BOOKING_DEPONSITED_STATUS = 1;
    const BOOKING_COMPLETED_STATUS = 2;
    const BOOKING_CANCEL_STATUS = 3;
    const PAYMENT_PAYPAL = "Paypal";
    protected static $roomTypes = ['1'=>'Twin','2' => 'Double','3'=>'Single'];

    protected $fillable = ['tour_name','status','travel_date','room_type',
                            'main_contact','email','contact_number','arrival_date',
                            'airline_flight_no','arrival_time','departure_date',
                            'departure_flight_no','departure_time','addition_comment',
                            'contribute','total','deposit','expired_at_date'];

    public static $rules = [];
    public static function getRoomTypes(){
        return self::$roomTypes;
    }
    public static function getStatus(){
        return [
                    self::BOOKING_WAITING_STATUS =>'Waiting',
                    self::BOOKING_DEPONSITED_STATUS => 'Desponsited',
                    self::BOOKING_COMPLETED_STATUS => 'Completed',
                    self::BOOKING_CANCEL_STATUS => 'Cancel'
               ];
    }
    public static function getStatusName($id){
        $status = self::getStatus();
        return isset($status[$id]) ? $status[$id] : '';
    }
    /*
    INPUT : array of passengers[sub_name], array of passengers[first_middle_name][]...
    OUTUT : array of passengers : [[sub_name,first_middle_name], [sub_name,first_middle_name]]
    */
    public static function retryPassengersData($passengers){
        $total = count($passengers['title']);
        $data = [];
        foreach($passengers as $k => $p){
            for($i=0;$i<$total;$i++){
                if(($k==='sub_name' && !$p[$i]) || ($k==='first_middle_name' && !$p[$i])){
                    break;
                }
                $data[$i][$k] = $p[$i];
            }
        }
        return $data;
    }
}