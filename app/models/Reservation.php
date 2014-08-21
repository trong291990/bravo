<?php 
class Reservation extends Eloquent {
	const BOOKING_ID_PREFIX = 'ID';

    const STATUS_PENDING = '0';
    const STATUS_CONFIRMED = '1';
    const STATUS_REJECTED = '2';

	protected $table = 'reservations';
	protected $fillable = ['tour_id','customer_name', 'customer_email', 'customer_phone', 'message'];

    public static $rules = array(
        'tour_id' => 'required',
        'customer_name' => 'required',
        'customer_email' => 'required'
    );

    public static function boot() {
        parent::boot();
        static::creating(function($reservation) {
            $reservation->booking_id = self::nextBookingId();
        });
    }

    public static function statusesForSelect() {
        return [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_CONFIRMED => 'Confirmed'
        ];
    }
    public function tour() {
        return $this->belongsTo('Tour', 'tour_id');
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