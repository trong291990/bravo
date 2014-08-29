<?php 

class Inquiry extends Eloquent {
    protected $table = 'inquiries';
    protected $guarded = ['id', 'is_resolved'];

    public function markResolved() {
    	$this->is_resolved = true;
    	$this->save();
    }
      
?>