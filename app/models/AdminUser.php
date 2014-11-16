<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class AdminUser extends Eloquent implements UserInterface, RemindableInterface {

    protected $table = 'admin_users';
    protected $hidden = array('password', 'remember_token');
    public $fillable = array(
        'name',
        'email',
        'password',
        'password_confirmation',
    );
    public static $rules = array(
        'name' => 'required',
        'email' => 'required|email|unique:admin_users,email|unique:customers,email|unique:specialists,email',
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password',
    );
    public static $updatePasswordRules = array(
        'password' => 'required|min:6',
        'password_confirmation' => 'required|same:password',
    );

    public static function boot() {
        parent::boot();
        static::saving(function($adminUser) {
                    if (Hash::needsRehash($adminUser->password)) {
                        $adminUser->password = Hash::make($adminUser->password);
                    }
                });
    }

    public function updateProfileRules() {
        return array(
            'name' => 'required',
            'email' => 'required|email|unique:admin_users,email,' . $this->id
        );
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
