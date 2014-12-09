<?php
class PaymentController extends BaseController {
    protected $paypalApiContext;
    function __construct($attr = array()) {
        //parent::__construct();
       $this->paypalApiContext = Paypalpayment:: ApiContext(
            Paypalpayment::OAuthTokenCredential(
                Config::get('paypal.clientId'),
                Config::get('paypal.ClientSecret')
            )
        );
       $mode =  Config::get('paypal.sanbox') ? 'sanbox' : 'live';
       $this->paypalApiContext->setConfig(array(
            'mode' => $mode,
            'http.ConnectionTimeOut' => Config::get('paypal.httpConnectionTimeOut',30),
            'log.LogEnabled' => Config::get('paypal.logEnabled',false),
            'log.FileName' => Config::get('paypal.logFileName',storage_path().'/logs/PayPal'.date('Y-m-d').'.log'),
            'log.LogLevel' => Config::get('paypal.ClientSecret','FINE')
        ));
    }
}