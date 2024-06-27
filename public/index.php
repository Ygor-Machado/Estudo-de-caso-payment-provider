<?php

use Beerandcode\Modulo5\Providers\CieloPaymentProvider;
use Beerandcode\Modulo5\Services\Checkout;
use Beerandcode\Modulo5\Utils\Http;

require __DIR__.'/../vendor/autoload.php';


$service = new Checkout('ygaounderground011@gmail.com', 1000);

echo $service->handle(new \Beerandcode\Modulo5\Providers\PaddlePaymentProvider(new Http()));