<?php

namespace App\PaymentGateways;


abstract class PaymentGateway implements PaymentGatewayInterface
{
    use PaymentTrait;

    // use the constructor to provide general information
    function __construct(public string $apiKey)
    {
        $this->apiKey = $apiKey;
    }
}
