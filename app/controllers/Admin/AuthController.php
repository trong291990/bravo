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
            return Redirect::route('admin.root');
        }
    }

    public function logout() {
        return Redirect::route('admin.login');
    }

}

?>
