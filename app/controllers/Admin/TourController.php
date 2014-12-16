<?php

namespace Admin;

use \Request;
use \Response;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Validator;
use \Tour;
use \Area;
use \TravelStyle;
use \Itinerary;

class TourController extends AdminBaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $areas = Area::get(array('id', 'name'));
        $tours = Tour::loadOrSearch(Input::all());
        $this->layout->content = View::make('admin.tour.index')
                ->with(compact('tours', 'areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $areas = Area::all();
        $travelStyles = TravelStyle::all();
        $this->layout->content = View::make('admin.tour.create')->with(compact('areas', 'travelStyles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $data = Input::all();
        $validator = Validator::make($data, Tour::$rules);
        if ($validator->passes()) {
            $tour = new Tour();
            $tour->area_id = $data['area_id'];
            $tour->name = $data['name'];
            $tour->meta_keyword = $data['meta_keyword'];
            $tour->meta_description = $data['meta_description'];
            $tour->price_from = $data['price_from'];
            $tour->duration = $data['duration'];
            $tour->include = $data['include'];
            $tour->not_include = $data['not_include'];
            $tour->overview = $data['overview'];
            $travelStyles = $data['travel_styles'];
            $keyword_inherit = 0;
            if(isset($data['keyword_inherit']) && $data['keyword_inherit']){
                $keyword_inherit = 1;
            }
            $tour->keyword_inherit = $keyword_inherit;
            $tour->save();
            $tour->travelStyles()->sync($travelStyles);
            $tour->places()->sync($data['places']);
            if (\Input::hasFile('photo')) {
                $tour->savePhoto(Input::file('photo'));
            }
            if (\Input::hasFile('thumbnail')) {
                $tour->saveThumnail(Input::file('thumbnail'));
            }
            Session::flash('success', "The tour {$tour->name} has been created successful");
            return Redirect::route('admin.tour.index');
        } else {
            Session::flash('error', "The tour could not be save");
            return Redirect::back()->withInput()->withErrors($validator->errors());
            
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
        $travelStyles = TravelStyle::all();
        $travelStyleIds = $tour->travelStylesIds();
        $this->layout->content = View::make('admin.tour.edit')
                ->with('areas', $areas)
                ->with('tour', $tour)
                ->with('placeIds', $placeIds)
                ->with('travelStyleIds', $travelStyleIds)
                ->with('travelStyles', $travelStyles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $data = Input::all();
        unset(Tour::$rules['photo']);
        $validator = Validator::make($data, Tour::$rules);
        if ($validator->passes()) {
            $tour = Tour::findOrFail($id);
            $tour->area_id = $data['area_id'];
            $tour->name = $data['name'];
            $tour->meta_keyword = $data['meta_keyword'];
            $tour->meta_description = $data['meta_description'];
            $tour->price_from = $data['price_from'];
            $tour->duration = $data['duration'];
            $tour->include = $data['include'];
            $tour->not_include = $data['not_include'];
            $tour->overview = $data['overview'];
            $keyword_inherit = 0;
            if(isset($data['keyword_inherit']) && $data['keyword_inherit']){
                $keyword_inherit = 1;
            }
            $tour->keyword_inherit = $keyword_inherit;
            $travelStyles = $data['travel_styles'];
            $tour->save();
            $tour->travelStyles()->sync($travelStyles);
            $tour->places()->sync($data['places']);
            if (\Input::hasFile('photo')) {
                $tour->savePhoto(Input::file('photo'));
            }
            if (\Input::hasFile('thumbnail')) {
                $tour->saveThumnail(Input::file('thumbnail'));
            }
            Session::flash('success', "The tour {$tour->name} has been updated successful");
            return Redirect::route('admin.tour.edit', array($tour->id));
        } else {
            //print_r($validator->errors()->toArray());die();
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
        $tour = Tour::findOrFail($id);
        $tour->completeDelete();
        Session::flash('success', "The tour has been deleted");
        return Redirect::route('admin.tour.index');
    }

    public function itinerary($id) {
        $tour = Tour::findOrFail($id);
        $itineraries = $tour->itineraries;
        $this->layout->content = View::make('admin.tour.itinerary.index')
                ->with('tour', $tour)
                ->with('itineraries', $itineraries);
    }

    public function updateItinerary($id) {
        $tour = Tour::findOrFail($id);
        $itineraries = Input::get('itineraries');
        foreach ($itineraries as $index => $itineraryAttrs) {
            $sanitized = $itineraryAttrs;
            $sanitized['breakfast'] = isset($itineraryAttrs['breakfast']);
            $sanitized['lunch'] = isset($itineraryAttrs['lunch']);
            $sanitized['dinner'] = isset($itineraryAttrs['dinner']);
            $sanitized['order'] = $index + 1;
            if (isset($itineraryAttrs['id']) && $itinerary = $tour->itineraries->find($itineraryAttrs['id'])) {
                $itinerary->update($sanitized);
            } else {
                $tour->itineraries()->save(with(new Itinerary($sanitized)));
            }
        }
        Session::flash('success', "The itineraries has been updated successfully");
        return Redirect::route('tour.itinerary.index', $id);
    }

    public function deleteItinerary($id, $itinerary_id) {
        $tour = Tour::findOrFail($id);
        $itinerary = $tour->itineraries->find($itinerary_id);
        $itinerary->delete();
        return Response::json([
                    'success' => true
        ]);
    }

}