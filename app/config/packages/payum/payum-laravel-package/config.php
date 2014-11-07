<?php

use Payum\Core\Storage\FilesystemStorage;
use Payum\Paypal\ExpressCheckout\Nvp\Api;

use Payum\Paypal\ExpressCheckout\Nvp\PaymentFactory as PaypalExpressPaymentFactory;
$detailsClass = 'Payum\Core\Model\ArrayObject';
$tokenClass = 'Payum\Core\Model\Token';
$detailsClass = 'Payum\Core\Model\ArrayObject';
$tokenClass = 'Payum\Core\Model\Token';

$paypalPayment['paypal_es'] = PaypalExpressPaymentFactory::create(new Api(array(
  'username' => 'trandinhtrong90-facilitator_api1.gmail.com',
    'password' => '1377595099',
    'signature' => 'AQflJqrAtuBe4lmi-A.DoeeVy8kAAQgz5fhmiiWe.6Op2b6t0PP0sPMw',
    'sandbox' => true
)));
return array(
    // You can pass on object or a service id from container.
    'token_storage' => new FilesystemStorage(storage_path().'/payments', $tokenClass, 'hash'),
    'payments' => array(
        'paypal_es' => $paypalPayment['paypal_es']
    ),
    'storages' => array(
        $detailsClass => new FilesystemStorage(storage_path().'/payments', $detailsClass),
    )
);