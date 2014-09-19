<?php
namespace Admin;

use \Request;
use \Response;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Customer;

class CustomerController extends AdminBaseController {

  public function index() {
    $customers = Customer::loadOrSearch(Input::all());
    $this->layout->content = View::make('admin.customer.index')
        ->with(compact('customers'));

  }
  public function create() {
    $this->layout->content = View::make('admin.customer.create');
  }


  public function store(){
    //
  }

  public function show($id) {
    $customer = Customer::findOrFail($id);
    $this->layout->content = View::make('admin.customer.show')->with(compact('customer'));
  }

  public function update($id) {
    $customer = Customer::findOrFail($id);
    $customer->update(Input::all());
    Session::flash('success', 'Customer info has been updated');
    return Redirect::back();
  }

  public function destroy($id) {
    //
  }

}