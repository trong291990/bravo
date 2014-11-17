<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Customer extends \Eloquent implements UserInterface, RemindableInterface {

    protected $fillable = ['name'];
    protected $table = 'customers';
    public static $registerRules = [
        'name' => 'required',
        'email' => 'required|email|unique:customers,email|unique:admin_users,email|unique:specialists,email',
        'password' => 'required|min:6'
    ];

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

    public function authentications() {
        return $this->hasMany('authentications', 'customer_id');
    }

    public function avatarUrl() {
        
    }

    public function reviews() {
        return $this->hasMany('Review', 'customer_id');
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