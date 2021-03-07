<?php

use Stripe\Checkout\Session;
use Stripe\Stripe;

require '../vendor/autoload.php';
Stripe::setApiKey('sk_test_51IRXGkJze1kcJ9654BaktLfKCLXJoy6rqybKysznoqRF25rnVuIHEOLTEnQ86Lc46fdC4zNgplNLlrOZfAmujP6Y00scJvkehD');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://127.0.0.1:4242';

$checkout_session = Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'unit_amount' => 2000,
            'product_data' => [
                'name' => 'Stubborn Attachments',
                'images' => ["https://i.imgur.com/EHyR2nP.png"],
            ],
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/success.html',
    'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

echo json_encode(['id' => $checkout_session->id]);