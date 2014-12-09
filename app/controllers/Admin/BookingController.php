<?php
namespace Admin;

use \Request;
use \Response;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Booking;
use \Validator;

class BookingController extends AdminBaseController {

	/**
	 * Display a listing of bookings
	 *
	 * @$this->layout->content =  Response
	 */
	public function index()
	{
		$bookings              = Booking::all();

		$this->layout->content =  View::make('admin.booking.index', compact('bookings'));
	}

	/**
	 * Show the form for creating a new booking
	 *
	 * @$this->layout->content =  Response
	 */
	public function create()
	{
        $this->layout->content =  View::make('admin.booking.create');
	}

	/**
	 * Store a newly created booking in storage.
	 *
	 * @$this->layout->content =  Response
	 */
	public function store()
	{
	    $validator = Validator::make($data = Input::all(), Booking::$rules);

	    if ($validator->fails())
	    {
	        return  Redirect::back()->withErrors($validator)->withInput();
	    }
		$data['token']         = 'secret_'.md5(microtime().uniqid());
		$data['expired_at']	   = \Carbon\Carbon::now()->addDays(Config::get('site.booking.expired_at_next_date', 4));
		$booing                = Booking::create($data);
		Session::flash('success', "The booking {$booing->name} has been updated successful");
		$this->layout->content =  Redirect::route('admin.booking.index');
	}

	/**
	 * Display the specified booking.
	 *
	 * @param  int  $id
	 * @$this->layout->content =  Response
	 */
	public function show($id)
	{
	    $booking = Booking::findOrFail($id);

	    $this->layout->content =  View::make('admin.booking.show', compact('booking'));
	}

	/**
	 * Show the form for editing the specified booking.
	 *
	 * @param  int  $id
	 * @$this->layout->content =  Response
	 */
	public function edit($id)
	{
		$booking = Booking::find($id);

		$this->layout->content =  View::make('admin.booking.edit', compact('booking'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @$this->layout->content =  Response
	 */
	public function update($id)
	{
		$booking = Booking::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Booking::$rules);

                if ($validator->fails())
                {
                    return  Redirect::back()->withErrors($validator)->withInput();
                }

		$booking->update($data);
                Session::flash('success', "The booking {$booking->name} has been updated successful");
		return  Redirect::route('admin.booking.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @$this->layout->content =  Response
	 */
	public function destroy($id)
	{
		Booking::destroy($id);

		return  Redirect::route('bookings.index');
	}

}