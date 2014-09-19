<?php

class Customer extends Eloquent {
  const FROM_REVIEW  = 'Review';
  const FROM_BOOKING = 'Booking';
  const FROM_INQUIRY = 'Inquiry';
  const FROM_NEWSLETTER = 'Subscribe Enewsletter';
  
  const FROM_OTHER = 'Other';

  public static $sources = [
    self::FROM_REVIEW, self::FROM_BOOKING, self::FROM_INQUIRY, self::FROM_NEWSLETTER, self::FROM_OTHER
  ];


  protected $table = 'customers';
  protected $guarded = ['id', 'source'];

  public static function boot() {
    parent::boot();
    static::saving(function($customer) {
      if (!$customer->source) {
          $customer->source = self::FROM_OTHER;
      }
    });
  }

  public static function createFromSource($source, $data = []) {
    $customer = new static($data);
    if(trim($source)) {
      $customer->source = $source;
    }
    $customer->save();
  }

  public static function loadOrSearch($options = []) {
    $query = self::select('*');
    if(isset($options['source']) && trim($options['source'])) {
      $query = $query->where('source','LIKE', '%' . $options['source'] . '%');
    }
    return $query->orderBy('created_at', 'DESC')->paginate(15);   
  }

  public static function loadSources() {


    return self::lists('source');
  }

}