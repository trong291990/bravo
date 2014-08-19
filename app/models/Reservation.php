<?php 
class Reservation extends Eloquent {
	const BOOKING_ID_PREFIX = 'ID';

	protected $table = 'reservations';
	protected $fillable = ['cusomter_name', 'cusomter_email', 'phone', 'message'];

    public static function boot() {
        parent::boot();
        static::creating(function($reservation) {
            $reservation->booking_id = self::nextBookingId();
        });
    }
    /**
     * Generate the next booking id
     * Format: <ID><YearMonthDay><number>
     * Example: ID2014081900001
     * 
     * @return string
     */
    public static function nextBookingId() {
        $total = self::count() + 1;
        $code = self::BOOKING_ID_PREFIX . date('Ymd') . zero_padding_number($total, 5);
        return $code;
    }    
}