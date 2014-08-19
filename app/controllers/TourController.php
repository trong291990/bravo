<?php

class TourController extends FrontendBaseController {
    public function area($slug) {
        $id = Area::where('slug','like',$slug)->first()->getOriginal();
        $area = Area::find($id['id']);
        $tours = $area->tours;
        $this->layout->content = View::make('frontend.tours.area')->with('tours', $tours);
    }
  
}