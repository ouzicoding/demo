<?php
use Stripe\Checkout\Session;
use Stripe\Stripe;

require '../vendor/autoload.php';
Stripe::setApiKey('sk_test_51IdnbkBUKSPWKz69Wsu5taaf4eCnIx06en3PkKubvog4jjia8kf12mg0iZKWXChata2cytbyL4FOpCrvLfRV6K6Z004wrxD4nX');
$YOUR_DOMAIN = 'http://127.0.0.1:4242';

try {
    $checkout_session = Session::create([
        'success_url' => $YOUR_DOMAIN . '/success.html',
        'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
        'payment_method_types' => ['card'],
        'mode' => 'subscription',
        'line_items' => [[
            'price' => 'price_1IsJ6JBUKSPWKz69tKlY5ngi',
            'quantity' => 1,
        ]],
    ]);
} catch (Exception $e) {
    echo $e->getError()->message;
}
print_r(['sessionId' => $checkout_session['id']]);
