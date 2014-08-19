<?php

class TourController extends FrontendBaseController {
    public function area($slug,$id) {
		print_r($id);die();
        $area = Area::find($id);
        $tours = $area->tours;
        $this->layout->content = View::make('frontend.tours.area')->with('tours', $tours);
    }
  
}