<?php

namespace App\PaymentGateways;

use App\Controller\PaymentsController;

class SquarePaymentGateway implements PaymentGatewayInterface
{

    // use the constructor to provide general information
    function __construct(public string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    function pay(PaymentsController $controller, $userId, $orderNumber)
    {

        $class = get_class($this);

        $controller->Flash->success(__(
            'User ID: {0}, Order Number: {1}, Amount: {2}, Class: {3}',
            $userId,
            $orderNumber,
            $controller->getRequest()->getData('amount'),
            $class
        ));
    }
}
