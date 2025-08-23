<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CartController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    /** Show cart */
    public function index()
    {
        $cart = $this->session->get('cart') ?? [];
        return view('cart/index', ['cart' => $cart]);
    }

    /** Add item to cart */
    public function addToCart()
    {
        $id       = $this->request->getPost('id');
        $name     = $this->request->getPost('name');
        $price    = (float) $this->request->getPost('price');
        $quantity = max(1, (int) $this->request->getPost('quantity'));
        $image    = $this->request->getPost('image') ?: 'default.png';
        $image    = basename($image);

        // Use public/images folder
        $imagePath = 'images/' . $image;
        if (!file_exists(FCPATH . $imagePath)) {
            $imagePath = 'images/default.png';
        }

        $cart = $this->session->get('cart') ?? [];
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = compact('id', 'name', 'price', 'quantity') + ['image' => $imagePath];
        }

        $this->session->set('cart', $cart);

        return $this->response->setJSON(['success' => true, 'cart' => $cart]);
    }

    /** Update single item qty */
    public function updateCartQty($id)
    {
        $data = $this->request->getJSON(true);
        $qty  = max(1, (int) ($data['quantity'] ?? 1));

        $cart = $this->session->get('cart') ?? [];
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $qty;
        }

        $this->session->set('cart', $cart);
        return $this->response->setJSON(['success' => true]);
    }

    /** Remove item */
    public function removeFromCart($id)
    {
        $cart = $this->session->get('cart') ?? [];
        unset($cart[$id]);
        $this->session->set('cart', $cart);
        return $this->response->setJSON(['success' => true]);
    }

    public function cartCount()
{
    $cart = session()->get('cart') ?? [];
    $count = 0;
    foreach ($cart as $item) {
        $count += $item['quantity'];
    }
    return $this->response->setJSON(['count' => $count]);
}

    public function clearCart()
    {
        $this->session->remove('cart');
        return $this->response->setJSON(['success' => true]);
    }
}


