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
        'email' => 'required|email|unique:admin_users,email|unique:customers,email',
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
        return  array(
            'name' => 'required',
            'email' => 'required|email|unique:admin_users,email,' . $this->id
        );
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken() {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName() {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail() {
        return $this->email;
    }

}
