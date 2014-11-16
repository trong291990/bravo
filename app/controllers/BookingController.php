<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BookingController
 *
 * @author DinhTrong
 */
class BookingController extends BaseController {
    protected $layout = 'layouts.frontend';
    public function form($tour_slug,$id){
        $this->layout->content =  View::make('frontend.booking.form');
    }
}
