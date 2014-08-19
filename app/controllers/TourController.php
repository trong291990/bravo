<?php

class TourController extends FrontendBaseController {
    public function area($slug) {
        $area = Area::where('slug','=',trim($slug))->first();
        $tours = $area->tours;
        $this->layout->content = View::make('frontend.tours.area')->with('tours', $tours);
    }
  
}