<?php

/*
 * Source: https://gist.github.com/JonoB/6637861
 */

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Validation\Validator;

class BaseModel extends Eloquent {

    /**
     * Error message bag
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Validation rules
     *
     * @var Array
     */
    protected static $rules = array();

    /**
     * Custom error messages
     *
     * @var array
     */
    protected static $messages = array();

    /**
     * Validator instance
     *
     * @var Illuminate\Validation\Validators
     */
    protected $validator;

    public function __construct(array $attributes = array(), Validator $validator = null) {
        parent::__construct($attributes);

        $this->validator = $validator ? : \App::make('validator');
    }

    /**
     * Listen for save event
     */
    protected static function boot() {
        parent::boot();
        static::saving(function($model) {
                    return $model->validate();
                });
    }

    /**
     * Validates current attributes against rules
     */
    public function validate() {
        $replace = ($this->getKey() > 0) ? $this->getKey() : '';
        foreach (static::$rules as $key => $rule) {
            static::$rules[$key] = str_replace(':id', $replace, $rule);
        }

        $validator = $this->validator->make($this->attributes, static::$rules, static::$messages);

        if ($validator->passes())
            return true;

        $this->setErrors($validator->messages());

        return false;
    }

    /**
     * Set error message bag
     *
     * @var Illuminate\Support\MessageBag
     */
    protected function setErrors($errors) {
        $this->errors = $errors;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * Return if there are any errors
     *
     * @return bool
     */
    public function hasErrors() {
        return !empty($this->errors);
    }

}