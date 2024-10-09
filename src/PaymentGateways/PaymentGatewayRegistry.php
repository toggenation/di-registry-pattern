<?php

namespace App\PaymentGateways;

use Exception;

class PaymentGatewayRegistry
{

    protected $gateways = [];

    function register($name, PaymentGatewayInterface $instance)
    {
        $this->gateways[$name] = $instance;
        return $this;
    }

    function get($name): PaymentGatewayInterface
    {
        if (array_key_exists($name, $this->gateways)) {
            return $this->gateways[$name];
        } else {
            throw new Exception("Invalid gateway");
        }
    }
}
