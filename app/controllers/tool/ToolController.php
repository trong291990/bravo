<?php

class ToolController extends BaseController {
    protected $layout = null;
    public function geo(){
        $places = Place::where('area_id','5')->get();
        foreach ($places as $place) {
            $Address = urlencode($place->name);
            $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
            $xml = simplexml_load_file($request_url) or die("url not loading");
            $status = $xml->status;
            if ($status=="OK" && !$place->lat && !$place->lng) {
                $Lat = $xml->result->geometry->location->lat;
                $Lon = $xml->result->geometry->location->lng;
                $place->lat = $Lat;
                $place->lng = $Lon;
                $place->save();
            }
        }
    }
    public function tourSlug(){
        $tours = Tour::all();
        foreach ($tours as $tour){
            $tour->slug = slug_string($tour->slug);
            $tour->save();
        }
    }
    public function placeSlug(){
        $places = Place::all();
        foreach ($places as $place){
            $place->slug = slug_string($place->name);
            $place->save();
        }
    }
}
