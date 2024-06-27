<?php

namespace Beerandcode\Modulo5\Providers\interfaces;

use Beerandcode\Modulo5\Utils\Http;

interface PaymentProviderContract
{
    public function __construct(Http $httpClient);

    public function charge(string $email, int $amount): string;
}