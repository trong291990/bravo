<?php

namespace Admin;

use \Response;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Validator;
use \Area;
use \Album;
use \AlbumPhoto;

class AlbumController extends AdminBaseController {

    public function index() {
        $areas = Area::all();
        $albums = Album::loadOrSearch(Input::all());
        $this->layout->content = View::make('admin.album.index')
                ->with(compact('albums', 'areas'));
    }

    public function create() {
        $areas = Area::all();
        $this->layout->content = View::make('admin.album.create')
                ->with(compact('areas'));
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
        $areas = Area::all();
        $album = Album::findOrFail($id);
        $this->layout->content = View::make('admin.album.show')
                ->with(compact('album', 'areas'));
    }

    public function uploadPhoto($id) {
        $album = Album::findOrFail($id);
        $uploadFile = Input::file('photo');
        $photo = $album->uploadPhoto($uploadFile);
        if(!$photo) {
            return Response::json([
                'success' => false
            ]);   
        } else {
            return Response::json([
                'success' => true,
                'photo_form' => View::make('admin.album._photo_form')
                    ->with('photo', $photo)->render()
            ]);            
        }
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

    public function searchForInsertLink() {
        $albums = Album::searchWithKeyword(Input::get('keyword'));
        return View::make('admin.album.search_for_insert_link', compact('albums'));
    }

}