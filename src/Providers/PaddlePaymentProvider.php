<?php

namespace Beerandcode\Modulo5\Providers;

use Beerandcode\Modulo5\Providers\interfaces\PaymentProviderContract;
use Beerandcode\Modulo5\Utils\Http;

class PaddlePaymentProvider implements PaymentProviderContract
{
    public function __construct(Http $clientHttp)
    {}
    public function charge(string $email, int $amount): string
    {
        return "Charging {$email} for {$amount} using Paddle";
    }
}