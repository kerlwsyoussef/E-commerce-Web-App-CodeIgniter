?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart($productId)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1; // Increment quantity
        } else {
            $cart[$productId] = [
                'id' => $product['id'],
                'name' => $product['productname'],
                'price' => $product['price'],
                'image' => $product['image'], // Add image here
                'quantity' => 1
            ];
        }

        session()->set('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart.');
    }

    // View cart
    public function viewCart()
    {
        $cart = session()->get('cart') ?? [];
        return view('cart_view', ['cart' => $cart]);
    }

    // Remove item from cart
    public function removeFromCart($productId)
    {
        $cart = session()->get('cart') ?? [];
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->set('cart', $cart);
        }
        return redirect()->back();
    }
}
