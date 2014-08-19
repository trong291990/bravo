<?php

class TourController extends FrontendBaseController {
    public function area($slug) {
        $area = Area::where('slug','=',trim($slug))->first();
        if(!$area){
            throw new Exception;
        }
        $tours = $area->tours()->paginate(5);
        $searchPlaces = $area->places()->where('search_able','>',0)->orderBy('search_able')->get();
        $this->layout->title = $area->name;
        $this->layout->content = View::make('frontend.tours.area')->with('area', $area)
            ->with('searchPlaces',$searchPlaces)
            ->with('tours',$tours);
    }
    
}