<?php

class HomeController extends FrontendBaseController {
    public function landing() {
        $this->layout = null;
        return View::make('frontend.landing');
    }

}