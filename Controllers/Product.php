<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class Product extends Controller
{
    public function view($productId)
    {
        $productModel = new ProductModel();

        // Fetch the product details by its ID
        $product = $productModel->find($productId);

        // Fetch random items (limited to 10 random items)
        $similarItems = $productModel->getRandomItems(10);

        // Check if the request is AJAX
        if ($this->request->isAJAX()) {
            // If it's an AJAX request, return the product details as JSON
            return $this->response->setJSON($product);
        }

        // If it's not an AJAX request, load the view to display the product details
        echo view('templates/header');
        echo view('product_view', [
            'product' => $product,
            'similarItems' => $similarItems
        ]);
        
    }

    public function addToCart($productId)
    {
        $session = session();
        $productModel = new ProductModel();

        // Fetch product details
        $product = $productModel->find($productId);

        // Get current cart from session
        $cart = $session->get('cart') ?? [];

        // Add product to cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'id' => $product['id'],
                'name' => $product['productname'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1
            ];
        }

        // Save cart to session
        $session->set('cart', $cart);

        return $this->response->setJSON(['success' => true, 'cart' => $cart]);
    }

    public function viewCart()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];
    
        // Ensure every item has an image, fallback if missing
        foreach ($cart as &$item) {
            $item['image'] = isset($item['image']) ? base_url('public/' . $item['image']) : base_url('public/default.png');
        }
    
        echo view('templates/header');
        echo view('cart_view', ['cart' => $cart]);
    }
    

    public function removeFromCart($productId)
    {
        $session = session();
        $cart = $session->get('cart');

        // Remove product from cart
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $session->set('cart', $cart);
        }

        return redirect()->to('/product/viewCart');
    }

    public function checkout()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to('/product/viewCart')->with('error', 'Your cart is empty.');
        }

        // Handle the checkout process here (e.g., process payment, create order, etc.)
        $session->remove('cart');

        echo view('templates/header');
        echo view('checkout_success');
       
    }
}

