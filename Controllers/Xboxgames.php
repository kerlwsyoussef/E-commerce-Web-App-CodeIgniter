<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\XboxgamesModel;

class Xboxgames extends Controller
{
    protected $xboxgamesModel;

    public function __construct()
    {
        $this->xboxgamesModel = new XboxgamesModel();
    }

    /**
     * List all Xbox games or filtered by criteria
     */
    public function index()
    {
        $filters = [];
    
        if ($this->request->getGet('category')) {
            $filters['category'] = $this->request->getGet('category');
        }
    
        if ($this->request->getGet('min_price')) {
            $filters['min_price'] = (float)$this->request->getGet('min_price');
        }
    
        if ($this->request->getGet('max_price')) {
            $filters['max_price'] = (float)$this->request->getGet('max_price');
        }
    
        $sort = $this->request->getGet('sort'); // ✅ added
    
        $products = $this->xboxgamesModel->filterProducts($filters, $sort);
    
        $randomItems = $this->xboxgamesModel->getRandomItems(5);
    
        echo view('templates/header');
        echo view('xboxgames', [
            'products' => $products,
            'randomItems' => $randomItems,
            'sort' => $sort // ✅ pass it to the view
        ]);
        
    }
    

    /**
     * View single product
     */
    public function view($productId)
    {
        $product = $this->xboxgamesModel->getProductById($productId);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Product not found");
        }

        $similarItems = $this->xboxgamesModel->getRandomItems(5);

        echo view('templates/header');
        echo view('product_view', [
            'product'      => $product,
            'similarItems' => $similarItems
        ]);
     
    }

    /**
     * Search products
     */
    public function search()
    {
        $keyword = $this->request->getGet('q') ?? '';
        $results = $this->xboxgamesModel->searchProducts($keyword);

        echo view('templates/header');
        echo view('xboxgames', [
            'products' => $results,
            'keyword'  => $keyword
        ]);
     
    }
}
