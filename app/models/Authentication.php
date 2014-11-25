<?php

class Authentication extends \Eloquent {
    const FACEBOOK_PROVIDER = 'Facebook';
    const GOOGLE_PROVIDER = 'Google';

    protected $fillable = [];

    public function customer() {
      return $this->belongsTo('Customer', 'customer_id');
    }

    public static function findByProviderAndUID($provider, $uid) {
      return self::where('provider', $provider)->where('uid', $uid)->first();
    }
}