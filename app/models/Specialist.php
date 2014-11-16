<?php

class Specialist extends Eloquent implements UserInterface, RemindableInterface {

    protected $table = 'specialists';
    protected $fillable = ['first_name', 'last_name', 'email', 'nationality', 'bio', 'languages', 'specialties'];

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