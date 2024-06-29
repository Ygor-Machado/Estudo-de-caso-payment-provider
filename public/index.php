<?php

use Beerandcode\Modulo5\Base\Facade;
use Beerandcode\Modulo5\Facades\Stripe;
use Beerandcode\Modulo5\Providers\CieloPaymentProvider;
use Beerandcode\Modulo5\Providers\interfaces\PaymentProviderContract;
use Beerandcode\Modulo5\Providers\PaddlePaymentProvider;
use Beerandcode\Modulo5\Services\Checkout;
use Beerandcode\Modulo5\Utils\Http;

require __DIR__.'/../vendor/autoload.php';

//$container = new \Beerandcode\Modulo5\Base\Container();
//$container->register(PaymentProviderContract::class,CieloPaymentProvider::class);
//
//
//$paymentProvider = $container->get(PaymentProviderContract::class);
//
//$service = new Checkout('ygaounderground011@gmail.com', 1000);
//
//echo $service->handle($paymentProvider);


//$provider = new \Beerandcode\Modulo5\Providers\StripePaymentProvider(new Http(new \Beerandcode\Modulo5\Utils\ThirdParty()));

echo Stripe::charge('ygaounderground011', 1000);