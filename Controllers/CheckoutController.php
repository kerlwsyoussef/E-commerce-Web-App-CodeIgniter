<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class CheckoutController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
        Stripe::setApiKey(\Config\Stripe::$secretKey);
    }

    public function createSession()
    {
        $cart = $this->session->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'Your cart is empty.');
        }

        $lineItems = [];
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name'   => $item['name'],
                        'images' => [base_url($item['image'])],
                    ],
                    'unit_amount' => (int) round($item['price'] * 100),
                ],
                'quantity' => $item['quantity'],
            ];
        }

        // Delivery fee logic
        $subtotal = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart));
        if ($subtotal < 50) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => ['name' => 'Delivery'],
                    'unit_amount' => 500,
                ],
                'quantity' => 1,
            ];
        }

        try {
            $checkoutSession = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items'           => $lineItems,
                'mode'                 => 'payment',
                'success_url'          => site_url('checkout/success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url'           => site_url('checkout/cancel'),
            ]);

            return redirect()->to($checkoutSession->url);
        } catch (\Exception $e) {
            log_message('error', 'Stripe Checkout error: ' . $e->getMessage());
            return redirect()->to('/cart')->with('error', 'Could not start checkout. Please try again.');
        }
    }

    public function success()
    {
        return view('checkout/success');
    }

    public function cancel()
    {
        return view('checkout/cancel');
    }
}

