<?php

namespace Admin;

use \Request;
use \Session;
use \Redirect;
use \Input;
use \View;

class HomeController extends AdminBaseController {

    /**
     * GET /admin
     * 
     * The dashboard for administrator
     */
    public function index() {
        Session::flash('success','Welcome to admin area');
        $this->layout->content = View::make('admin.index');
    }

}

?>
