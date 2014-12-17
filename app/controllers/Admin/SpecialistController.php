<?php

namespace Admin;

use \Session;
use \Redirect;
use \Input;
use \View;
use \Validator;
use \Specialist;
use \Area;

class SpecialistController extends AdminBaseController {

    public function index() {
        $specialists = Specialist::loadOrSearch(Input::all());
        $this->layout->content = View::make('admin.specialist.index', compact('specialists'));
    }

    public function create() {
        $areas = Area::all();
        $this->layout->content = View::make('admin.specialist.create', compact('areas'));
    }

    public function store() {
        $validator = Validator::make($data = Input::all(), Specialist::$CREATE_RULES);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $specialist = Specialist::create($data);
            $specialist->updateAreas(Input::get('area_ids', []));
            Session::flash('success', "Specialist profile created successfully");
            return Redirect::route('admin.specialist.show', $specialist->id);
        }
    }

    public function show($id) {
        $specialist = Specialist::find($id);
        $areas = Area::all();
        $this->layout->content = View::make('admin.specialist.show', compact('specialist', 'areas'));
    }

    public function update($id) {
        $specialist = Specialist::findOrFail($id);
        $validator = Validator::make($data = Input::all(), Specialist::updateRules($specialist));
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $specialist->update($data);
        $specialist->updateAreas(Input::get('area_ids', []));
        Session::flash('success', "Specialist profile updated successfully");
        return Redirect::route('admin.specialist.show', $id);
    }

    public function destroy($id) {
        Specialist::destroy($id);
        return Redirect::route('admin.specialist.index');
    }

}
