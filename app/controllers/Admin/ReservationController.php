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
        $reservations = Reservation::paginate(20);
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
        $this->layout->content = View::make('admin.reservation.create')->with('tours', $tours);
    }	
}