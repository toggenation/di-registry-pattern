<?php

declare(strict_types=1);

namespace App\Controller;

use App\PaymentGateways\PaymentGatewayRegistry;
use App\PaymentGateways\SquarePaymentGateway;
use Cake\Core\Configure;
use Cake\Utility\Inflector;

/**
 * Payments Controller
 *
 */
class PaymentsController extends AppController
{
    public function pay(PaymentGatewayRegistry $registry)
    {
        if ($this->request->is('POST')) {
            try {
                $registry->register('square', new SquarePaymentGateway(Configure::read('square.api_key')));

                $registry
                    ->get($this->request->getData('provider'))
                    ->pay($this, rand(1, 10), uniqid('PO'));

                return $this->redirect(['action' => 'pay']);
            } catch (\Throwable $e) {
                $this->Flash->error($e->getMessage());
            }
        }

        $providers = [
            'stripe',
            'square',
            'paypal'
        ];

        $providers = array_combine($providers, array_map(function ($val) {
            return Inflector::humanize($val);
        }, $providers));

        $this->set(compact('providers'));
    }
}
