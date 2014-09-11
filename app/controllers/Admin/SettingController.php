<?php

namespace Admin;

use \Session;
use \Redirect;
use \Input;
use \View;
use \Setting;

class SettingController extends AdminBaseController {

    public function editTerms() {
        $content = Setting::getTermsContent();
        $this->layout->content = View::make('admin.setting.edit_terms')
                ->with('content', $content);
    }

    public function updateTerms() {
        Setting::updateTermsContent(Input::get('content'));
        Session::flash('success', 'Update content successfully');
        return Redirect::back();
    }

}

?>
