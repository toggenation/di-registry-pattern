<?php

namespace App\PaymentGateways;

use App\Controller\PaymentsController;

trait PaymentTrait
{
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
