<?php

use \Response;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Area;
use \Album;
use \AlbumPhoto;

class AlbumController extends FrontendBaseController {

    protected $layout = 'layouts.frontend';

    public function __construct() {
        parent::__construct();
        $this->beforeFilter(function() {
                    if (!$this->loggedCustomer) {
                        return Redirect::to(url('/tours/indochina-tours'));
                    }
                }, ['only' => ['download']]
        );
    }

    public function index() {
        $areas = Area::all();
        $albums = Album::recent();
        $mostViewAlbums = Album::all();
        $this->layout->content = View::make('frontend.album.index')
                ->with(compact('albums', 'areas', 'mostViewAlbums'));
    }

    public function area($area_slug) {
        $areas = Area::all();
        $area = Area::where('name', 'LIKE', '%' . $area_slug . '%')->first();
        $albums = $area->albums()->orderBy('created_at', 'DESC')->paginate(4);
        $mostViewAlbums = $area->mostViewAlbums();
        $this->layout->content = View::make('frontend.album.area')
                ->with(compact('albums', 'mostViewAlbums', 'areas', 'area'));
    }

    public function show($area_slug, $album_id) {
        $areas = Area::all();
        $area = Area::where('name', 'LIKE', '%' . $area_slug . '%')->first();
        $album = Album::findOrFail(string_to_int($album_id));
        $album->increaseViews('views');
        $this->layout->content = View::make('frontend.album.show')
                ->with(compact('album', 'area', 'areas'));
    }

    public function postReview($album_id) {
        
    }

    public function download($album_id) {
        $album = Album::findOrFail($album_id);
        $zippedPath = $album->getZippedPath();
        $headers = array('Content-Type: application/zip', 'Content-Description' => 'File Transfer');
        return Response::download($zippedPath, $album->zippedFileName(), $headers);
    }

}

?>
