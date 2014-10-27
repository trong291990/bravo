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

class AlbumController extends AdminBaseController {

    public function index() {
        $albums = Album::with('category')->orderBy('created_at', 'DESC')->paginate(20);
        $this->layout->content = View::make('admin.album.index')
                ->with(compact('albums'));
    }

    public function create() {
        $categories = AlbumCategory::all();
        $this->layout->content = View::make('admin.album.create')
                ->with(compact('categories'));
    }

    public function store() {
        $validator = Validator::make(Input::all(), Album::$rules);
        if ($validator->passes()) {
            $album = new Album(Input::all());
            $album->save();
            Session::flash('success', "The album has been created successful");
            return Redirect::route('admin.album.index');
        } else {
            return Redirect::back()->withInput()->withErrors($validator->errors());
        }
    }

    public function show($id) {
        $categories = AlbumCategory::all();
        $album = Album::findOrFail($id);
        $this->layout->content = View::make('admin.album.show')
                ->with(compact('album', 'categories'));
    }

    public function uploadPhoto($id) {
        $album = Album::findOrFail($id);
        $uploadFile = Input::file('photo');
        $photo = $album->uploadPhoto(
                $uploadFile, Input::get('title', null), Input::get('is_primary', false)
        );
        return Response::json([
                    'success' => true,
                    'id' => $photo->id,
                    'thumb_url' => asset($photo->thumb_path)
        ]);
    }

    public function edit($id) {
        //
    }

    public function update($id) {
        $primaryPhotoID = Input::get('is_primary');
        $photos = Input::get('photos');
    }

    public function destroy($id) {
        //
    }

}