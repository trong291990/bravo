<?php

namespace Admin;

use \Request;
use \Response;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Validator;
use \AlbumCategory;
use \Album;
use \AlbumPhoto;

class AlbumCategoryController extends AdminBaseController {

    public function index() {
        $categories = AlbumCategory::all();
        $this->layout->content = View::make('admin.album_category.index')
                ->with(compact('categories'));
    }

    public function destroy($id) {
        $cat = AlbumCategory::findOrFail($id);
        $cat->delete();
        Session::flash('success', 'The category has been deleted');
        return Redirect::route('admin.album_category.index');
    }

}
