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
use \Reservation;

class ReservationController extends AdminBaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
	public function index() {
        $reservations = Reservation::with('tour')->paginate(20);
        $this->layout->content = 
        	View::make('admin.reservation.index')->with('reservations', $reservations);		
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $tours = Tour::all();
        $this->layout->content = 
            View::make('admin.reservation.create')->with('tours', $tours);
    }	

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $validator = Validator::make(Input::all(), Reservation::$rules);
        if($validator->passes()) {
            $reservation = new Reservation(Input::all());
            $reservation->is_by_admin = true;
            $reservation->save();
            Session::flash('success', "The reservation has been created successful");
            return Redirect::route('admin.reservation.index');            
        } else {
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
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
    }    
}