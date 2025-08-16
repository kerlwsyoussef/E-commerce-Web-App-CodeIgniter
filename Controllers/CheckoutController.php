<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    public function createSession()
    {
        // ✅ Set the Stripe secret key here
        Stripe::setApiKey(\Config\Stripe::$secretKey);

        $cart = session()->get('cart') ?? [];
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $lineItems = [];
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['name']
                    ],
                    'unit_amount' => intval($item['price'] * 100),
                ],
                'quantity' => $item['quantity'],
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => site_url('checkout/success'),
            'cancel_url' => site_url('checkout/cancel'),
        ]);

        return redirect()->to($session->url);
    }
}
