<?php 

class Inquiry extends Eloquent {
    protected $table = 'inquiries';
    protected $guarded = ['id', 'is_resolved'];

    public static $rules = [
    	'first_name' => 'required',
    	'last_name' => 'required',
    	'email' => 'required',
    	'number_of_participants' => 'required|integer',
        'departure_city' => 'required',
    	'departure_date' => 'required',
    	'length_of_trip' => 'required|integer',
    ];

    public static function loadOrSearch($options =[]) {
        $query = self::select('*');
        if(isset($options['status']) && in_array($options['status'], ['resolved', 'pending'])) {
            if($options['status'] == 'resolved') {
                $key = '1';
            } else {
                $key = '0';
            }
            $query = $query->where('is_resolved',$key);
        }
        return $query->orderBy('created_at', 'DESC')->orderBy('is_resolved', 'DESC')->paginate();
    }

    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function statusString() {
        if($this->is_resolved) {
            return 'Resolved';
        } else {
            return 'Pending';
        }
    }    
    public function markResolved() {
    	$this->is_resolved = true;
    	$this->save();
    }
}
?>