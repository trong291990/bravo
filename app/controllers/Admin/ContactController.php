<?php
namespace Admin;

use \Request;
use \Response;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Contact;

class ContactController extends AdminBaseController {

  public function index() {
    $contacts = Contact::loadOrSearch(Input::all());
    $this->layout->content = View::make('admin.contact.index')
        ->with(compact('contacts'));

  }
  public function create() {
    $this->layout->content = View::make('admin.contact.create');
  }


  public function store(){
    //
  }

  public function show($id) {
    $contact = Contact::findOrFail($id);
    $this->layout->content = View::make('admin.contact.show')->with(compact('contact'));
  }

  public function update($id) {
    $contact = Contact::findOrFail($id);
    $contact->update(Input::all());
    Session::flash('success', 'Contact updated successfully');
    return Redirect::back();
  }

  public function destroy($id) {
    $contact = Contact::findOrFail($id);
    $contact->delete();
    Session::flash('success', 'Contact has been removed');
    return Redirect::back();
  }

}