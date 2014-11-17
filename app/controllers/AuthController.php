<?php

use \Response;
use \Session;
use \Redirect;
use \Input;
use \View;
use \Customer;
use \Authentication;

class AuthController extends FrontendBaseController {

  public function customerLogin() {
    $checkLogin = Auth::customer()->attempt(array(
      'email' => Input::get('email'),
      'password' => Input::get('password')
    ));

    if ($checkLogin) {
      $response['success'] = true;
    } else {
      $response['success'] = false;
    }
    return Response::json($response);
  }

  public function customerLogout() {
    Auth::customer()->logout();
    return Redirect::to(Input::get('back_url', url('/')));
  }

  public function customerRegister() {
    $validator = Validator::make(Input::all(), Customer::$registerRules);
    $response = [];
    if ($validator->passes()) {
      $response['success'] = true;
      $customer = Customer::register(Input::all());
      Auth::customer()->login($customer);
    } else {
      $response['success'] = false;
      $response['errors'] = $validator->errors()->toArray();
    }
    return Response::json($response);
  }  
  
  // GET /facebook-auth
  public function facebook() {
    $fb = OAuth::consumer( 'Facebook' );
    $code = Input::get( 'code' );
    // GET /facebook-auth
    if ( !empty( $code ) ) {
      $token = $fb->requestAccessToken( $code );
      $result = json_decode( $fb->request( '/me' ), true );
      $customer = Customer::findOrCreateByOmniath(Authentication::FACEBOOK_PROVIDER, $result);
      if($customer) {
        Auth::customer()->login($customer);
        // Welcome flash message
      } else {
        // Failed flash message
      }
      return Redirect::to(Session::get('omniauth_back_url', url('/')));
    }
    else {
      Session::put('omniauth_back_url', Input::get('back_url', url('/')));
      $url = $fb->getAuthorizationUri();
      return Redirect::to( (string)$url );
    }
  }

  // GET /google-auth
  public function google() {
    $code = Input::get( 'code' );
    $googleService = OAuth::consumer( 'Google' );
    
    if ( !empty( $code ) ) {
      $token = $googleService->requestAccessToken( $code );
      $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );
      $customer = Customer::findOrCreateByOmniath(Authentication::GOOGLE_PROVIDER, $result);
       if($customer) {
        Auth::customer()->login($customer);
      } else {
        // Failed flash message
      }
      return Redirect::to(Session::get('omniauth_back_url', url('/')));
    }
    else {
      Session::put('omniauth_back_url', Input::get('back_url', url('/')));
      $url = $googleService->getAuthorizationUri();
      return Redirect::to( (string)$url );
    }
  }  
}