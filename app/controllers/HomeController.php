<?php

class HomeController extends FrontendBaseController {
    
    protected $layout = 'layouts.frontend';
    public function landing() {
        $this->layout = null;
        return View::make('frontend.landing');
    }
    public function contact(){
        $this->layout->content = View::make('frontend.pages.contact');
    }
}