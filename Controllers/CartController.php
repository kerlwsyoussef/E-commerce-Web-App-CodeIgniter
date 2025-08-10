<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart($productId)
    {
        $cart = session()->get('cart') ?? [];
        $cart[$productId] = true;
        session()->set('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart.');
    }

    // View cart
    public function viewCart()
    {
        $productModel = new ProductModel();
        $cart = session()->get('cart') ?? [];
        $productIds = array_keys($cart);

        if (empty($productIds)) {
            $productsInCart = [];
        } else {
            $productsInCart = $productModel->whereIn('id', $productIds)->findAll();
        }

        return view('cart_view', ['productsInCart' => $productsInCart]);
    }
}
