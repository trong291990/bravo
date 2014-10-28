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
        $categories = AlbumCategory::all();
        $albums = Album::loadOrSearch(Input::all());
        $this->layout->content = View::make('admin.album.index')
                ->with(compact('albums', 'categories'));
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
            return Redirect::route('admin.album.show', $album->id );
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
        $photo = $album->uploadPhoto($uploadFile);
        return Response::json([
                    'success' => true,
                    'photo_form' => View::make('admin.album._photo_form')->with('photo', $photo)->render()
        ]);
    }

    public function addCategory() {
        $validator = Validator::make(Input::all(), AlbumCategory::$rules);
        $response = [];
        $response['success'] = $validator->passes();
        if ($response['success']) {
            $cat = new AlbumCategory;
            $cat->name = Input::get('name');
            $cat->save();
            $response['message'] = 'Successfully created category <b>' . $cat->name . '</b>';
        } else {
            $response['message'] = 'Error: ' . $validator->errors()->first();
        }
        return Response::json($response);
    }

    public function edit($id) {
        
    }

    public function update($id) {
        $album = Album::findOrFail($id);
        $primaryPhotoID = Input::get('is_primary');
        $photos = Input::get('photos');

        // Update album
        $album->update(Input::all());

        // Update photos
        if ($photos) {
            foreach ($photos as $photoID => $attrs) {
                $photo = $album->photos()->findOrFail($photoID);
                $photo->is_primary = ($photoID == $primaryPhotoID);
                $photo->title = $attrs['title'];
                $photo->save();
            }
        }
        return Redirect::back();
    }

    public function destroy($id) {
        $album = Album::findOrFail($id);
        $album->delete();
        Session::flash('success', 'Album and photos has been deleted');
        return Redirect::route('admin.album.index');
    }

    public function deletePhoto($photo_id) {
        $photo = AlbumPhoto::findOrFail($photo_id);
        $photo->delete();
        return Response::json([]);
    }

}