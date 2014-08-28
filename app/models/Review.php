<?php 

class Review extends Eloquent {

    protected $table = 'reviews';
    protected $fillable = ['first_name', 'last_name', 'email', 'departure_date', 'destination', 'content', 'score'];	
    
    public static function loadOrSearch($options =[]) {
    	$query = self::select('*');
    	if(isset($options['status']) && in_array($options['status'], ['approved', 'pending'])) {
			$query = $query->byApproval($options['status'] == 'approved');
    	}
    	return $query->orderBy('created_at', 'DESC')->paginate();
    }

    public function scopeByApproval($query, $state) {
    	if($state == true) {
    		$state = '1';
    	} else {
    		$state = '0';
    	}
    	return $query->where('is_approved', $state);
    }

    public function statusString() {
    	if($this->is_approved) {
    		return 'Approved';
    	} else {
    		return 'Pending';
    	}
    }

    public function fullName() {
    	return $this->first_name . ' ' . $this->last_name;
    }

    public function doReject() {
    	$this->delete();
    }

    public function doApprove() {
    	$this->is_approved = true;
    	$this->save();
    }    

}
?>