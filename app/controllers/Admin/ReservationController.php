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
        $tours = Tour::get(array('id', 'name'));
        $reservations = Reservation::loadOrSearch(Input::all());
        $this->layout->content =
                View::make('admin.reservation.index')
                ->with(compact('reservations','tours'));
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
        if ($validator->passes()) {
            $reservation = new Reservation(Input::all());
            $reservation->is_by_admin = true;
            $reservation->payment_token = md5(uniqid('bravopayment').microtime());
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
        $reservation = Reservation::findOrFail($id);
        $this->layout->content = View::make('admin.reservation.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $tours = Tour::all();
        $reservation = Reservation::findOrFail($id);
        $this->layout->content = View::make('admin.reservation.edit')
                ->with(compact('reservation', 'tours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $inputs = Input::all();
        $reservation = Reservation::findOrFail($id);
        $validator = Validator::make(Input::all(), Reservation::$rules);
        if ($validator->passes()) {
            $reservation->update($inputs);
            Session::flash('success', "The reservation updated successful");
            return Redirect::route('admin.reservation.edit', $reservation->id);
        } else {
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
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        Session::flash('success', "The reservation has been deleted successful");
        return Redirect::route('admin.reservation.index');
    }

}