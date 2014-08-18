<?php

namespace Admin;

use \Request;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Validator;
use \Tour;
use \Area;

class TourController extends AdminBaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $tours = Tour::paginate(20);
        $this->layout->content = View::make('admin.tour.index')->with('tours', $tours);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $areas = Area::all();
        $this->layout->content = View::make('admin.tour.create')->with('areas', $areas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $data = Input::all();
        $validator = Validator::make($data, \Tour::$rules);
        if ($validator->passes()) {
            $tour = new Tour();
            $tour->area_id = $data['area_id'];
            $tour->name = $data['name'];
            $tour->slug = $data['slug'];
            $tour->meta_keyword = $data['meta_keyword'];
            $tour->price_from = $data['price_from'];
            $tour->duration = $data['duration'];
            $tour->include = $data['include'];
            $tour->not_include = $data['not_include'];
            $tour->overview = $data['overview'];
            $travelStyles = $data['travelStyle'];
            $tour->save();
            $tour->travelStyles()->sync($travelStyles);
            $tour->places()->sync($data['places']);
            $this->_savePhoto($tour);
            Session::flash('success', "The tour {$tour->name} has been created successful");
            return Redirect::route('admin.tour.index');
        } else {
            Session::flash('error', "The tour has could not be save");
            return Redirect::back()->withInput()->withErrors($validator->errors());
        }
    }

    private function _savePhoto($tour) {
        if (Input::hasFile('photo')) {
            $fileName = prepare_fileName(Input::file('photo')->getClientOriginalName());
            $destPath = public_path() . \Tour::PHOTO_PATH . '/' . $tour->id;
            Input::file('photo')->move($destPath, $fileName);
            $tour->photo = $fileName;
            $tour->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $areas = Area::all();
        $tour = Tour::findOrFail($id);
        $placeIds = $tour->placeIds();
        $travelStyleIds = $tour->travelStylesIds();
        $this->layout->content = View::make('admin.tour.edit')
                ->with('areas', $areas)
                ->with('tour', $tour)
                ->with('placeIds', $placeIds)
                ->with('travelStyleIds', $travelStyleIds);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $data = Input::all();
        $validator = Validator::make($data, Tour::$rules);
        if ($validator->passes()) {
            $tour = Tour::findOrFail($id);
            $tour->area_id = $data['area_id'];
            $tour->name = $data['name'];
            $tour->slug = $data['slug'];
            $tour->meta_keyword = $data['meta_keyword'];
            $tour->price_from = $data['price_from'];
            $tour->duration = $data['duration'];
            $tour->include = $data['include'];
            $tour->not_include = $data['not_include'];
            $tour->overview = $data['overview'];
            $travelStyles = $data['travelStyle'];
            $tour->save();
            $tour->travelStyles()->sync($travelStyles);
            $tour->places()->sync($data['places']);
            $this->_savePhoto($tour);
            Session::flash('success', "The tour {$tour->name} has been updated successful");
            return Redirect::route('admin.tour.edit', array($tour->id));
        } else {
            Session::flash('error', "The tour has could not be save");
            return Redirect::back()->withInput()->withErrors($validator->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}