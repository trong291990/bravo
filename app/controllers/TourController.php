<?php

class TourController extends FrontendBaseController {

    private $_apiContext;
    private $_ClientId = 'AVJx0RArQzkCCsWC0evZi1SsoO4gxjDkkULQBdmPNBZT4fc14AROUq-etMEY';
    private $_ClientSecret = 'EH5F0BAxqonVnP8M4a0c6ezUHq-UT-CWfGciPNQOdUlTpWPkNyuS6eDN-tpA';

    public function area($slug) {
        $area = Area::where('slug', '=', trim($slug))->first();
        $place = null;
        $params = Request::query();
        $sorts = [];
        $sorts['price'] = isset($params['price']) ? $params['price'] : false;
        $sorts['travel_style'] = isset($params['travel_style']) ? $params['travel_style'] : false;
        $sorts['duration'] = isset($params['duration']) ? $params['duration'] : false;
        if ($area) {
            $toursQuery = Tour::where('area_id', '=', $area->id)->orderBy('viewed', 'desc');
            $toursParent = $area->slug;
            $title = $area->name . " Tours";
        } else {
            $place = Place::where('slug', '=', trim(str_replace('-tours', '', $slug)))->first();
            if ($place) {
                $toursQuery = Tour::with('places')
                        ->whereHas('places', function($query) use ($place) {
                                    $query->where('places.id', $place->id);
                                })
                        ->whereHas('travelStyles', function($query) use ($sorts) {
                            $query->where('travel_styles.id', '1');
                        });
            }
            //sort
            $area = Area::find($place->area_id);
            $title = $place->name . " Tours";
            $toursParent = $place->slug;
        }

        if ($sorts['travel_style']) {
            $toursQuery->whereHas('travelStyles', function($query) use ($sorts) {
                        $query->where('travel_styles.id', $sorts['travel_style']);
                    });
        } else {
            if (!$place)
                $toursQuery = $toursQuery->with('places');
//            if ($sorts['travel_style']) {
//                $toursQuery = $area->tours()->with('places')->whereHas('travelStyles', function($query) use ($sorts) {
//                            $query->where('travel_styles.id', $sorts['travel_style']);
//                        });
//            } else {
//                $toursQuery = $toursQuery->with('places');
//            }
        }
        if ($sorts['price']) {
            $priceSorts = Tour::priceSorts();
            $toursQuery = $toursQuery->whereRaw("price_from {$priceSorts[$sorts['price']]['condition']}");
        }
        if ($sorts['duration']) {
            $priceSorts = Tour::durationSorts();
            $toursQuery = $toursQuery->whereRaw("duration {$priceSorts[$sorts['duration']]['condition']}");
        }
        $tours = $toursQuery->paginate(9);
        View::composer(Paginator::getViewName(), function($view) {
                    $query = array_except(Input::query(), Paginator::getPageName());
                    $view->paginator->appends($query);
                });
        $searchPlaces = $area->places()->where('search_able', '>', 0)->orderBy('search_able')->get();
        $this->layout->content = View::make('frontend.tours.area')->with('area', $area)
                ->with('searchPlaces', $searchPlaces)
                ->with('tours', $tours)
                ->with('sorts', $sorts)
                ->with('title', $title)
                ->with('toursParent', $toursParent)
                ->with('place', $place);
    }

    public function search() {
        $keyword = trim(Input::get('keyword'));
        $tours = Tour::searchByKeyword($keyword);
        $this->layout->content = View::make('frontend.tours.search', compact('tours'));
    }

    public function show($areaSlug, $tourSlug) {
        $area = Area::where('slug', $areaSlug)->first();
        if (!$area) {
            $place = Place::where('slug', '=', trim(str_replace('-tours', '', $areaSlug)))->first();
            $area = Area::find($place->area_id);
        }
        $tour = Tour::where('slug', $tourSlug)->first();
        $tour->viewed++;
        $tour->save();
        $otherTours = $area->tours()->where('tours.id', '<>', $tour->id)->take(4)->get();
        $itineraries = $tour->itineraries()->orderBy('order', 'ASC')->get();
        $places = $tour->places()->orderBy('order', 'ASC')->get();
        $specialists = $tour->area->specialists;
        //$specialists->first()->fullName();
        $this->layout->content = View::make('frontend.tours.show')
                ->with(compact('area', 'tour', 'itineraries', 'places', 'otherTours', 'specialists'));
    }

    public function compare() {
        $tourIds = Input::get('select_packages');
        //prd($tourIds);
        if (empty($tourIds)) {
            Redirect::to('/');
        }
        $Ids = array();
        foreach ($tourIds as $key => $id) {
            if ($key <= 2) {
                $Ids[] = $id;
            }
        }
        $tours = Tour::whereIn('id', $Ids)->get();
        $this->layout->content =
                View::make('frontend.tours.compare')
                ->with(compact('tours'));
    }

    public function placeCoordinates($id) {
        $response = [];
        $response['places'] = [];
        $tour = Tour::find($id);
        if ($tour) {
            $response['success'] = true;
            $response['places'] = $tour->places()
                    ->where('lat', '<>', 'NULL')
                    ->where('lng', '<>', 'NULL')
                    ->get(array('name', 'lat', 'lng'))
                    ->toArray();
        } else {
            $response['success'] = false;
        }
        return Response::json($response);
    }

    public function booking() {
        $data = Input::all();
        //print_r($data);die();
        $validator = Validator::make($data, Reservation::$rules);
        if ($validator->passes()) {
            $reservation = new Reservation($data);
            $reservation->is_by_admin = true;
            $reservation->save();
            Mail::send('emails.notify.new_booking', ['reservation' => $reservation], function($message) {
                        $message->to('vntourismjsc@gmail.com')
                                ->subject('Bravo Tour - Customer booked tour');
                    });
            Session::flash('booking_success', "Your booking request has been sent. We will contact with you in 2 hours");
            if (isset($data['payment'])) {
                Session::push('tourId', $reservation->tour_id);
                return Redirect::to('/payment/create');
            } else {
                return Redirect::to('/tours/indochina-tours');
            }
        } else {
            //print_r($validator->errors()->toArray());die();
            return Redirect::to('/');
        }
    }

    private function settingPayment() {
        $this->_apiContext = Paypalpayment:: ApiContext(
                        Paypalpayment::OAuthTokenCredential(
                                $this->_ClientId, $this->_ClientSecret
                        )
        );
        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/PayPal.log',
            'log.LogLevel' => 'FINE'
        ));
    }

    private function createPayment() {
        $this->settingPayment();
        $payer = Paypalpayment::Payer();
        $payer->setPayment_method("paypal");

        $amount = Paypalpayment:: Amount();
        $amount->setCurrency("USD");
        $amount->setTotal("1.00");

        $transaction = Paypalpayment:: Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription("This is the payment description.");

        $baseUrl = Request::root();
        $redirectUrls = Paypalpayment:: RedirectUrls();
        $redirectUrls->setReturn_url($baseUrl . '/paymento/confirmpayment');
        $redirectUrls->setCancel_url($baseUrl . '/paymento/cancelpayment');
        //var_dump($baseUrl);die();
        $payment = Paypalpayment:: Payment();
        $payment->setIntent("sale");
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);

        //set the trasaction id , make sure $_paymentId var is set within your class
        $this->_paymentId = $response->id;

        //dump the repose data when create the payment
        $redirectUrl = $response->links[1]->href;

        //this is will take you to complete your payment on paypal
        //when you confirm your payment it will redirect you back to the rturned url set above
        //inmycase sitename/payment/confirmpayment this will execute the getConfirmpayment function bellow
        //the return url will content a PayerID var
        return Redirect::to($redirectUrl);
    }

    public function createInquiry() {
        $areas = Area::with('places')->notIsParent()->get();
        $this->layout->content =
                View::make('frontend.tours.inquiry')->with(compact('areas'));
    }

    public function storeInquiry() {
        $inputs = Input::all();
        $validator = Validator::make($inputs, Inquiry::$rules);
        if ($validator->passes()) {
            $inquiry = new Inquiry($inputs);
            $inquiry->save();
            Mail::send('emails.notify.new_inquiry', ['inquiry' => $inquiry], function($message) {
                        $message->to('vntourismjsc@gmail.com')
                                ->subject('Bravo Tour - Received new inquiry from customer');
                    });
            Session::flash('success', "Your booking request has been sent. We will contact with you in 2 hours");
            return Redirect::back();
        } else {
            return Redirect::back()->withInput()->withErrors($validator->errors());
        }
    }

}
