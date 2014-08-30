<?php

class TourController extends FrontendBaseController {

    public function area($slug) {
        $area = Area::where('slug', '=', trim($slug))->first();
        $place =null;
        if ($area) {
            $toursQuery = Tour::where('area_id','=',$area->id)->orderBy('viewed','desc');
        }else{
            $place = Place::where('slug', '=', trim($slug))->first();
            if($place){
                //$toursQuery = Tour::whereHas('places')
            }
        }
        $params = Request::query();
        $toursQuery = Tour::where('area_id','=',$area->id)->orderBy('viewed','desc');
        $sorts = [];
        $sorts['price'] = isset($params['price']) ? $params['price'] : false;
        $sorts['travel_style'] = isset($params['travel_style']) ? $params['travel_style'] : false;
        $sorts['duration'] = isset($params['duration']) ? $params['duration'] : false;
        if($sorts['travel_style']){
            $toursQuery =  $area->tours()->with('places')->whereHas('travelStyles',function($query) use ($sorts){
                $query->where('travel_styles.id',$sorts['travel_style']);
            });
        }else{
            $toursQuery =  $toursQuery->with('places');
        }
        //pr($params);
        //prd($sorts);
        if($sorts['price']){
            $priceSorts = Tour::priceSorts();
            $toursQuery = $toursQuery->whereRaw("price_from {$priceSorts[$sorts['price']]['condition']}");
        }
        if($sorts['duration']){
            $priceSorts = Tour::durationSorts();
            $toursQuery = $toursQuery->whereRaw("duration {$priceSorts[$sorts['duration']]['condition']}");
        }
        $tours = $toursQuery->paginate(9);
        $searchPlaces = $area->places()->where('search_able', '>', 0)->orderBy('search_able')->get();
        $this->layout->title = $area->name;
        $this->layout->content = View::make('frontend.tours.area')->with('area', $area)
                ->with('searchPlaces', $searchPlaces)
                ->with('tours', $tours)
                ->with('sorts',$sorts);
    }

    public function show($areaSlug, $tourSlug) {
        $area = Area::where('slug', $areaSlug)->first();
        $tour = $area->tours()->with('places')->where('slug', $tourSlug)->first();
        $tour->viewed++;
        $tour->save();
        $otherTours = $area->tours()->where('tours.id','<>', $tour->id)->take(4)->get();
        $itineraries = $tour->itineraries()->orderBy('order', 'ASC')->get();
        $places = $tour->places()->orderBy('order','ASC')->get();
        $this->layout->content = View::make('frontend.tours.show')
                ->with(compact('area', 'tour', 'itineraries', 'places','otherTours'));
    }
    
    public function compare(){
        $tourIds = Input::get('select_packages');
        //prd($tourIds);
        if(empty($tourIds)){
            Redirect::to('/');
        }
        $Ids = array();
        foreach ($tourIds as $key => $id) {
            if($key<=2){
               $Ids[] = $id;
            }
        }
        $tours = Tour::whereIn('id',$Ids)->get();
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
    
    public function booking(){
        $data = Input::all();
        $validator = Validator::make($data, Reservation::$rules);
        if ($validator->passes()) {
            $reservation = new Reservation($data);
            $reservation->is_by_admin = true;
            $reservation->save();
            Session::flash('booking_success', "Your booking request has been sent. We will contact with you in 2 hours");
            return Redirect::to('/tours/indochina-tours');
        } else {
            return Redirect::to('/');
        }
    }

    public function createInquiry() {
        $this->layout->content = 
            View::make('frontend.tours.inquiry');
    }

    public function storeInquiry() {
        $inputs = Input::all();
        $validator = Validator::make($inputs, Inquiry::$rules);
        if($validator->passes()) {
            $inquiry = new Inquiry($inputs);
            $inquiry->save();
            Session::flash('success', "Your booking request has been sent. We will contact with you in 2 hours");
            return Redirect::back();
        } else {
            return Redirect::back()->withInput()->withErrors($validator->errors());
        }
    }
}