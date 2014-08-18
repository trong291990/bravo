<?php
namespace Admin;

use \Request;
use \Session;
use \Redirect;
use \Input;
use \View;
class ToursController extends AdminBaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $tours = \Tour::paginate(20);
            $this->layout->content = View::make('admin.tours.index')->with('tours',$tours);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            $this->layout->content = View::make('admin.tours.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $data = Input::all();
            $validator = \Validator::make($data,  \Tour::$rules);
            if($validator->passes()){
                $tour = new \Tour();
                $tour->area_id = $data['area_id'];
                $tour->name = $data['name'];
                $tour->slug = $data['slug'];
                $tour->meta_keyword = $data['meta_keyword'];
                $tour->price_from = $data['price_from'];
                $tour->duration = $data['duration'];
                $tour->include = $data['include'];
                $tour->not_include = $data['not_include'];
                $tour->overview = $data['overview'];
                $travelStyles = $data['travelStyle'];
                $tour->save();
                $tour->travelStyles()->sync($travelStyles);
                $this->_savePhoto($tour);
                Session::flash('success',"The tour {$tour->name} has been created successful");
                return \Redirect::route('admin.tours.index');
            }else {
                Session::flash('error',"The tour {$tour->name} has could not be save");
                return \Redirect::back()->withInput()->withErrors($validator->errors());
            }
	}
        private function _savePhoto($tour){
            if(Input::hasFile('photo')){
                $fileName = prepare_fileName(Input::file('photo')->getClientOriginalName());
                $destPath = public_path().\Tour::PHOTO_PATH.'/'.$tour->id;
                Input::file('photo')->move($destPath, $fileName);
                $tour->photo = $fileName;
                $tour->save();
            }
        }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}