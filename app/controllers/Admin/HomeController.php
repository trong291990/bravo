<?php

namespace Admin;

use \Request;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Mail;

class HomeController extends AdminBaseController {

    /**
     * GET /admin
     * 
     * The dashboard for administrator
     */
    public function index() {
        $this->layout->content = View::make('admin.index');
    }

}

?>
