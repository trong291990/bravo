<?php

namespace Admin;

use \Request;
use \Session;
use \Redirect;
use \Input;
use \View;
use \StaticPage;

class StaticPageController extends AdminBaseController {

    public function index() {
        $this->layout->content = View::make('admin.static_page.index');
    }

    public function edit() {
        $page_name = Request::path();
        $page = StaticPage::findOrCreateByName($page_name);
        if ($page) {
            $this->layout->content = View::make('admin.static_page.edit')
                    ->with('page', $page);
        } else {
            throw new NotFoundHttpException;
        }
    }

    public function update() {
        $page_name = Request::path();
        $page = StaticPage::findOrCreateByName($page_name);
        $page->update(Input::all());
        Session::flash('success', 'Update content successfully');
        return Redirect::route('admin' . 'edit' . $page_name);
    }

}
?>
