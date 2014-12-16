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
        if (inputHasAny(['country', 'type', 'keyword'])) {
            // Do searching
            $selectedArea = null;
            $albumQuery = Album::orderBy('views', 'DESC');
            if (Input::has('country') && ($selectedArea = Area::findByName(Input::get('country')))) {
                $albumQuery = $albumQuery->withAreaID($selectedArea->id);
            }

            $selectedType = Input::get('type', null);
            if ($selectedType && Album::isValidType(Input::get('type'))) {
                $albumQuery = $albumQuery->withType($selectedType);
            }

            $keyword = Input::get('keyword', null);
            if ($keyword) {
                $albumQuery = $albumQuery->withKeyword($keyword);
            }
            $albums = $albumQuery->get();
            $this->layout->content = View::make('frontend.album.search', compact('areas', 'albums'));
        } else {
            $cityAlbums = Album::city()->mostView()->get();
            $hotelAlbums = Album::hotel()->mostView()->get();
            $travellerAlbums = Album::traveller()->mostView()->get();
            $this->layout->content = View::make(
                            'frontend.album.index', compact('areas', 'cityAlbums', 'hotelAlbums', 'travellerAlbums')
            );
        }
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
        $album = Album::with('comments.customer')->findOrFail(substr($album_id, strrpos($album_id, '-') + 1));
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

    public function storeComment($album_id) {
        $album = Album::findOrFail($album_id);
        $res = [];
        $comment = $album->buildComment($this->loggedCustomer, Input::all());
        $comment->setCustomer($this->loggedCustomer);
        if ($comment->save()) {
            $res['success'] = true;
            $res['html'] = View::make('frontend.album._comment_box', compact('comment'))->render();
        } else {
            $res['success'] = false;
            $res['message'] = 'Post comment failed, please try again';
        }
        return Response::json($res);
    }

}

?>
