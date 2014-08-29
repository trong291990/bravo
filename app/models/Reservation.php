<?php

class Reservation extends Eloquent {

    const BOOKING_ID_PREFIX = 'ID';
    const STATUS_PENDING = '0';
    const STATUS_CONFIRMED = '1';
    const STATUS_REJECTED = '2';

    protected $table = 'reservations';
    protected $fillable = ['tour_id', 'customer_name', 'customer_email',
        'customer_phone', 'message', 'status', 'start_date'
    ];
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
        static::saving(function($reservation) {
                    if(!$reservation->start_date) {
                        $reservation->start_date = NULL;
                    }
                    // Auto update confirmed_at when status is confirmed
                    if ($reservation->status == self::STATUS_CONFIRMED && !$reservation->confirmed_at) {
                        $reservation->confirmed_at = date('Y-m-d H:i:m');
                    }
                });
    }

    public static function loadOrSearch($options = []) {
        $sanitized_options = [];
        foreach ($options as $key => $val) {
            $sanitized_options[$key] = trim($val);
        }

        $query = self::select('*')->with('tour');

        if (isset($sanitized_options['tour_id']) && $sanitized_options['tour_id']) {
            $query = $query->where('tour_id', $sanitized_options['tour_id']);
        }

        if (isset($sanitized_options['keyword']) && $sanitized_options['keyword']) {
            $keyword = '%' . $sanitized_options['keyword'] . '%';
            $query = $query->where(function($query) use($keyword) {
                        $query->where('booking_id', 'LIKE', $keyword)
                           ->orWhere('customer_name', 'LIKE', $keyword);
                    });
        }

        if(isset($sanitized_options['status']) && in_array($sanitized_options['status'], ['pending','confirmed'])) {
            $k = $sanitized_options['status'] == 'confirmed' ? '1' : '0';
            $query = $query->where('status', $k);
        }
        return $query->orderBy('created_at', 'DESC')->paginate();        
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

    public function is_confirmed() {
        return $this->status == self::STATUS_CONFIRMED;
    }

    /**
     * Generate the next booking id
     * Format: <ID><YearMonthDay><number>
     * Example: ID20140819001
     * 
     * @return string
     */
    public static function nextBookingId() {
        $total = self::count() + 1;
        $code = self::BOOKING_ID_PREFIX . date('Ymd') . zero_padding_number($total, 3);
        return $code;
    }

}