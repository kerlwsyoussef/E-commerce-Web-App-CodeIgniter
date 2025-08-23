<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PcgamesModel;

class Pcgames extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new PcgamesModel();
    }

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

        $sort = $this->request->getGet('sort'); // Get the sort option from the form

        $products = $this->productModel->filterProducts($filters, $sort); // Pass filters + sort
        $randomItems = $this->productModel->getRandomItems(5);

        echo view('templates/header');
        echo view('pcgames', [
            'products' => $products,
            'randomItems' => $randomItems,
            'sort' => $sort
        ]);
     
    }

    public function view($productId)
    {
        $product = $this->productModel->getProductById($productId);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Product not found");
        }

        $similarItems = $this->productModel->getRandomItems(5);

        echo view('templates/header');
        echo view('product_view', [
            'product' => $product,
            'similarItems' => $similarItems
        ]);
       
    }

    public function search()
    {
        $keyword = $this->request->getGet('q') ?? '';
        $results = $this->productModel->searchProducts($keyword);

        echo view('templates/header');
        echo view('pcgames', [
            'products' => $results,
            'keyword' => $keyword
        ]);
       
    }
}
