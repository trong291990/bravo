<?php

namespace Admin;

use \Request;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Auth;

class AuthController extends AdminBaseController {

    public function login() {
        if (Request::isMethod('GET')) {
            return View::make('admin.login');
        } else {
            $checkLogin = Auth::admin()->attempt(array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
                ), Input::has('remember_me')
            );
            if ($checkLogin) {
                return Redirect::intended('/admin');
            } else {
                Session::flash('error', "Email or password is invalid");
                return Redirect::back()->withInput();
            }

            return Redirect::route('admin.root');
        }
    }

    public function logout() {
        Auth::admin()->logout();
        return Redirect::route('admin.login');
    }

    public function forgotPassword() {
        
    }
    
    public function reminderPassword() {

    }

}

?>
