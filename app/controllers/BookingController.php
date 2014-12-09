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
class BookingController extends PaymentController {
    protected $layout = 'layouts.frontend';
    public function form($token){
        $booking = Booking::where('token',$token)
                   ->where('expired_at',">",\Carbon\Carbon::now()->subDays(Config::get('site.booing.expired_at_nex_days',4)))
                   ->first();
        $this->layout->content =  View::make('frontend.booking.form')->with(compact('booking'));
    }
    public function deposit(){
    	$data = Input::all();
        $booking = Booking::where('token',$data['token'])
                   ->where('expired_at',">=",\Carbon\Carbon::now()->subDays(Config::get('site.booing.expired_at_nex_days', 4)))
                   ->first();
        if(!$booking){
            App:abort(404);
        }
        $passengers         = $this->_retryPassengersData($data['passengers']);
        $booking->passenger = json_encode($passengers);
        $booking->save();
        return $this->makePaymentByPaypal($booking,count($passengers)+1);
    }
    private function makePaymentByPaypal($booking,$quality){
        $payer = Paypalpayment::Payer();
        $payer->setPayment_method("paypal");

        $amount = Paypalpayment:: Amount();
        $amount->setCurrency("USD");
        $amount->setTotal($quality* $booking->deposit);

        $item1 = Paypalpayment::Item();
        $item1->setName($booking->tour_name)
              ->setCurrency('USD')
              ->setQuantity($quality)
              ->setPrice($booking->deposit);

        $itemList = Paypalpayment::ItemList();
        $itemList->setItems(array($item1));
        $transaction = Paypalpayment:: Transaction();
        $transaction->setAmount($amount)
                    ->setItemList($itemList);
        $transaction->setDescription('Pay a deposit for '.$booking->tour_name);
        
        $redirectUrls = Paypalpayment:: RedirectUrls();
        $redirectUrls->setReturn_url(route('booking.confirmpayment'));
        $redirectUrls->setCancel_url(route('root'));
        $payment = Paypalpayment:: Payment();
        $payment->setIntent("sale");
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->paypalApiContext);

        //set the trasaction id , make sure $_paymentId var is set within your class
        $booking->payment_type = Booking::PAYMENT_PAYPAL;
        $booking->payment_token = $response->id;
        $booking->payment_date = \Carbon\Carbon::now();
        $booking->total_passenger = $quality;
        $booking->save();
        Session::remove('paymentId');
        Session::put('paymentId', $response->id);
        //dump the repose data when create the payment
        $redirectUrl = $response->links[1]->href;

        //this is will take you to complete your payment on paypal
        //when you confirm your payment it will redirect you back to the rturned url set above
        //inmycase sitename/payment/confirmpayment this will execute the getConfirmpayment function bellow
        //the return url will content a PayerID var
        return Redirect::to( $redirectUrl );
    }
    private function _retryPassengersData($passengers){
        $total = count($passengers['title']);
        $data = [];
        foreach($passengers as $k => $p){
            for($i=0;$i<$total;$i++){
                if($k==='name' && !$p[$i] ){
                    break;
                }
                $data[$i][$k] = $p[$i];
            }
        }
        return $data;
    }
    public function confirmPayment(){
        $payerId = Input::get('PayerID');
        $paymentId =  Session::get('paymentId');
        $payment = Paypalpayment::get($paymentId, $this->paypalApiContext);
        $paymentExecution = Paypalpayment::PaymentExecution();
        $paymentExecution->setPayer_id( $payerId );
        $executePayment = $payment->execute($paymentExecution, $this->paypalApiContext);
        
        //check your response and whatever you want with the response
        //....
        $payer = $executePayment->getPayer();
        //echo $payer->getPayerInfo();
        $booking = Booking::where('payment_token',$payerId)->first();
        if(!$booking){
            App::abort(404);
        }
        $status = $payment->getState();
        if($status==='approved'){
            $booking->status = Booking::BOOKING_DEPONSITED_STATUS;
            $booking->save();
        }
        
    }
}
