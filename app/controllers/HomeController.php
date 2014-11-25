<?php

class HomeController extends FrontendBaseController {

    protected $layout = 'layouts.frontend';

    public function landing() {
        $this->layout = null;
        return View::make('frontend.landing');
    }

    public function staticPage() {
        $page_name = Request::path();
        $page = StaticPage::findOrCreateByName($page_name);
        $this->layout->content = View::make('frontend.static_page')
            ->with('page', $page);
    }

    public function subscribeNewsletter() {
      if(trim(Input::get('email'))) {
         Customer::createFromSource(
            Customer::FROM_NEWSLETTER,
            [
              'email' => Input::get('email')
            ]
         );
     }
       return Redirect::back();
    }

}
