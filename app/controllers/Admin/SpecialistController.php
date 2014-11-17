<?php

namespace Admin;

use \Session;
use \Redirect;
use \Input;
use \View;
use \Validator;
use \Specialist;

class SpecialistController extends AdminBaseController {

    public function index() {
        $specialists = Specialist::paginate();
        $this->layout->content = View::make('admin.specialist.index', compact('specialists'));
    }

    public function create() {
        $this->layout->content = View::make('admin.specialist.create');
    }

    public function store() {
        $validator = Validator::make($data = Input::all(), Specialist::$CREATE_RULES);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            Specialist::create($data);
            return Redirect::route('posts.index');
        }
    }

    public function show($id) {
        $specialist = Specialist::find($id);
        $this->layout->content = View::make('admin.specialist.show', compact('specialist'));
    }

    public function update($id) {
        $specialist = Specialist::findOrFail($id);
        $validator = Validator::make($data = Input::all(), Specialist::updateRules($specialist));
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $specialist->update($data);
        return Redirect::route('posts.index');
    }

    public function destroy($id) {
        Specialist::destroy($id);
        return Redirect::route('posts.index');
    }

}