<?php

class Wishlist extends Eloquent {
  protected $fillable = ['tour_id', 'customer_id'];
  
  public function tour() {
    return $this->belongsTo('Tour', 'tour_id');
  }
}