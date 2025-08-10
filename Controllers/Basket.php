<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class Basket extends Controller
{
    public function index()
    {
        $session = session();
        $basket = $session->get('basket') ?? [];

        // Load the basket view
        echo view('templates/header');
        return view('basket_view', ['basket' => $basket]);
    }

    public function add($productId)
    {
        $session = session();
        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        // Check if the basket is already in the session
        $basket = $session->get('basket') ?? [];

        // Add the product to the basket
        if (isset($basket[$productId])) {
            $basket[$productId]['quantity']++;
        } else {
            $basket[$productId] = [
                'product' => $product,
                'quantity' => 1
            ];
        }

        // Save the basket back to the session
        $session->set('basket', $basket);

        // Redirect to the basket view
        return redirect()->to('/basket');
    }

    public function remove($productId)
    {
        $session = session();
        $basket = $session->get('basket') ?? [];

        // Remove the product from the basket
        if (isset($basket[$productId])) {
            unset($basket[$productId]);
        }

        // Save the updated basket back to the session
        $session->set('basket', $basket);

        // Redirect to the basket view
        return redirect()->to('/basket');
    }

    public function clear()
    {
        $session = session();

        // Clear the basket
        $session->remove('basket');

        // Redirect to the basket view
        return redirect()->to('/basket');
    }
}
