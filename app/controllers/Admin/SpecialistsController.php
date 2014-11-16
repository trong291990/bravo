<?php

namespace Admin;

use \Session;
use \Redirect;
use \Input;
use \View;

class SpecialistsController extends AdminBaseController {

    public function index() {
        $posts = Specialist::all();
        return View::make('posts.index', compact('posts'));
    }

    public function create() {
        return View::make('posts.create');
    }

    public function store() {
        $validator = Validator::make($data = Input::all(), Specialist::$rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        Specialist::create($data);
        return Redirect::route('posts.index');
    }

    public function show($id) {
        $post = Specialist::findOrFail($id);
        return View::make('posts.show', compact('post'));
    }

    public function edit($id) {
        $post = Specialist::find($id);
        return View::make('posts.edit', compact('post'));
    }

    public function update($id) {
        $post = Specialist::findOrFail($id);
        $validator = Validator::make($data = Input::all(), Specialist::$rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $post->update($data);
        return Redirect::route('posts.index');
    }

    public function destroy($id) {
        Specialist::destroy($id);
        return Redirect::route('posts.index');
    }

}