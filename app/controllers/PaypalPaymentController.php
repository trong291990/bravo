<?php

class PaypalPaymentController extends BaseController{
     private $_apiContext;

    /**
     * Set the ClientId and the ClientSecret.
     * @param 
     *string $_ClientId
     *string $_ClientSecret
     */
    private $_ClientId='AVJx0RArQzkCCsWC0evZi1SsoO4gxjDkkULQBdmPNBZT4fc14AROUq-etMEY';
    private $_ClientSecret='EH5F0BAxqonVnP8M4a0c6ezUHq-UT-CWfGciPNQOdUlTpWPkNyuS6eDN-tpA';

    /*
     *   These construct set the SDK configuration dynamiclly, 
     *   If you want to pick your configuration from the sdk_config.ini file
     *   make sure to update you configuration there then grape the credentials using this code :
     *   $this->_cred= Paypalpayment::OAuthTokenCredential();
    */
    public function __construct()
    {
        // ### Api Context
        // Pass in a `ApiContext` object to authenticate 
        // the call. You can also send a unique request id 
        // (that ensures idempotency). The SDK generates
        // a request id if you do not pass one explicitly. 

        $this->_apiContext = Paypalpayment:: ApiContext(
            Paypalpayment::OAuthTokenCredential(
                $this->_ClientId,
                $this->_ClientSecret
            )
        );

        // dynamic configuration instead of using sdk_config.ini

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path().'/logs/PayPal.log',
            'log.LogLevel' => 'FINE'
        ));

    }
    public function create()
    {
            $tourId = Session::get('tourId');
            $tour = Tour::findOrFail($tourId);
            $payer = Paypalpayment::Payer();
            $payer->setPayment_method("paypal");

            $amount = Paypalpayment:: Amount();
            $amount->setCurrency("USD");
            $amount->setTotal($tour->price_from);

            $transaction = Paypalpayment:: Transaction();
            $transaction->setAmount($amount);
            $transaction->setDescription($tour->name);

            $baseUrl = Request::root();
            $redirectUrls = Paypalpayment:: RedirectUrls();
            $redirectUrls->setReturn_url($baseUrl.'/paymento/confirmpayment');
            $redirectUrls->setCancel_url($baseUrl.'/paymento/cancelpayment');
            $payment = Paypalpayment:: Payment();
            $payment->setIntent("sale");
            $payment->setPayer($payer);
            $payment->setRedirectUrls($redirectUrls);
            $payment->setTransactions(array($transaction));

            $response = $payment->create($this->_apiContext);

            //set the trasaction id , make sure $_paymentId var is set within your class
            $this->_paymentId = $response->id;

            //dump the repose data when create the payment
            $redirectUrl = $response->links[1]->href;

            //this is will take you to complete your payment on paypal
            //when you confirm your payment it will redirect you back to the rturned url set above
            //inmycase sitename/payment/confirmpayment this will execute the getConfirmpayment function bellow
            //the return url will content a PayerID var
            return Redirect::to( $redirectUrl );
    }
    public function show($payment_id)
    {
       $payment = Paypalpayment::get($payment_id,$this->_apiContext);

       echo "<pre>";

       print_r($payment);die();
    }
    public function getConfirmpayment(){
        
        $payer_id = Input::get('PayerID');
        $this->_paymentId = Request::query('paymentId');
        $payment = Paypalpayment::get($this->_paymentId, $this->_apiContext);

        $paymentExecution = Paypalpayment::PaymentExecution();

        $paymentExecution->setPayer_id( $payer_id );

        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

        //check your response and whatever you want with the response
        //....
    }
} 
