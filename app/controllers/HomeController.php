<?php

class HomeController extends FrontendBaseController {

    protected $layout = 'layouts.frontend';

    public function landing() {
        $this->layout = null;
        return View::make('frontend.landing');
    }

    public function review() {
        $this->layout->content = View::make('frontend.pages.review')
            ->with('reviews', Review::where('is_approved', 1)
            ->paginate(10));
    }

    public function staticPage() {
        $page_name = Request::path();
        $page = StaticPage::findOrCreateByName($page_name);
        $this->layout->content = View::make('frontend.static_page')
            ->with('page', $page);
    }

}
