<?php
namespace Design;
/*
 * This controller only for design
 */

/**
 * Description of StaticController
 *
 * @author DinhTrong
 */
class DesignController extends \BaseController {
    protected $layout = 'layouts.frontend';
    public function album(){
        $this->layout->content = \View::make('design.album');
    }
    public function albumCity(){
        $this->layout->content = \View::make('design.album_city');
    }
    public function detailAlbum(){
        $this->layout->content = \View::make('design.album_detail');
    }
    public function staff(){
        $this->layout->content = \View::make('design.staff_profile');
    }
    public function getPrintTour(){
       return \View::make('design.print_tour');
    }
}
