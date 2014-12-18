<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Customer extends \Eloquent implements UserInterface, RemindableInterface {

    protected $fillable = ['name', 'email', 'dob', 'phone', 'nationality'];
    protected $table = 'customers';
    public static $registerRules = [
        'name' => 'required',
        'email' => 'required|email|unique:customers,email|unique:admin_users,email|unique:specialists,email',
        'password' => 'required|min:6'
    ];

    public static function boot() {
        parent::boot();
        static::saving(function($customer) {
            if (Hash::needsRehash($customer->password)) {
                $customer->password = Hash::make($customer->password);
            }
        });
    }

    public static function findOrCreateByOmniath($provider, $data) {
        $auth = Authentication::findByProviderAndUID($provider, $data['id']);
        if ($auth) {
            return $auth->customer;
        } else {
            return self::createByOmniath($provider, $data);
        }
    }

    public static function createByOmniath($provider, $data) {
        $customer = new Customer;
        $auth = new Authentication;
        $auth->provider = $provider;
        $auth->uid = $data['id'];
        $customer->email = $data['email'];
        switch ($provider) {
            case Authentication::FACEBOOK_PROVIDER:
                $customer->name = $data['first_name'] . ' ' . $data['last_name'];
                $customer->gender = $data['gender'];
                break;
            case Authentication::GOOGLE_PROVIDER:
                $customer->name = $data['name'];
                $customer->avatar_url = $data['picture'];
                break;
            default:
                return null;
                break;
        }
        $customer->password = Hash::make(str_random(10));
        if ($customer->save()) {
            $auth->customer_id = $customer->id;
            $auth->save();
        }
        return $customer;
    }

    public static function register($data) {
        $customer = new Customer;
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->password = Hash::make($data['password']);
        $customer->save();
        return $customer;
    }

    public static function updateRules($customer) {
        return [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:customers,email, ' . $customer->id . '|unique:admin_users,email|unique:specialists,email'
        ];
    }

    public function authentications() {
        return $this->hasMany('authentications', 'customer_id');
    }

    public function wishlists() {
        return $this->hasMany('Wishlist', 'customer_id');
    }

    public function addOrRemoveFromWishlist($tour_id) {
        $item = $this->wishlists()->where('tour_id', $tour_id)->first();
        if($item) {
            $item->delete();
        } elseif(Tour::find($tour_id)) {
                $this->wishlists()->save(new Wishlist(['tour_id' => $tour_id]));
        }
    }

    public function avatarUrl() {
        
    }

    public function reviews() {
        return $this->hasMany('Review', 'customer_id');
    }

    public function updatePassword($new_password) {
        $this->password = $new_password;
        $this->save();
    }
    /*
     * Authenticate functions
     */

    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    }

    public function getReminderEmail() {
        return $this->email;
    }

}