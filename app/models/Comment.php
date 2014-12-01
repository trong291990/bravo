<?php

class Comment extends \Eloquent {

    protected $fillable = ['score', 'content'];

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