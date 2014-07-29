<?php

class HomeController extends FrontendBaseController {

    public function index() {
        $this->layout->content = View::make('frontend.index');
    }

}