<?php

class TourController extends FrontendBaseController {

    public function area($slug) {
        $area = Area::where('slug', '=', trim($slug))->first();
        if (!$area) {
            throw new Exception;
        }
        $tours = $area->tours()->with('places')->paginate(5);
        $searchPlaces = $area->places()->where('search_able', '>', 0)->orderBy('search_able')->get();
        $this->layout->title = $area->name;
        $this->layout->content = View::make('frontend.tours.area')->with('area', $area)
                ->with('searchPlaces', $searchPlaces)
                ->with('tours', $tours);
    }

    public function show($areaSlug, $tourSlug) {
        $area = Area::where('slug', $areaSlug)->first();
        $tour = $area->tours()->with('places')->where('slug', $tourSlug)->first();
        $itineraries = $tour->itineraries()->orderBy('order', 'ASC')->get();
        $this->layout->content = View::make('frontend.tours.show')
                ->with(compact('area', 'tour', 'itineraries'));
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
                    ->get(array('lat', 'lng'))
                    ->toArray();
        } else {
            $response['success'] = false;
        }
        return Response::json($response);
    }

}