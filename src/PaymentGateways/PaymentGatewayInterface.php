<?php

namespace App\PaymentGateways;

use App\Controller\PaymentsController;

interface PaymentGatewayInterface
{
    function pay(PaymentsController $controller, $userId, $orderNumber);
}
