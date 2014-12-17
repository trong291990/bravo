<?php

class Comment extends \Eloquent {

    protected $fillable = ['customer_id', 'score', 'content'];
    
    static $rules = [
        'content' => 'required|min:15'
    ];

    /**
     * Has customer
     */
    public function scopeAuthorized($query) {
        return $query->where('customer_id', '<>', 'NULL');
    }

    public function commentable() {
        return $this->morphTo();
    }

    public function customer() {
        return $this->belongsTo('Customer', 'customer_id');
    }

    public function setCustomer($customer) {
        $this->customer_id = $customer->id;
    }

}
