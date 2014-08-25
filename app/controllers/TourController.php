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
        $tour = $area->tours()->where('slug', $tourSlug)->first();
         $this->layout->content = View::make('frontend.tours.show')
                 ->with(compact('area', 'tour'));
    }

}