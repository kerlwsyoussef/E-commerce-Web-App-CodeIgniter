<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PlaystationconsolesModel;

class Playstationconsoles extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new PlaystationconsolesModel();
    }

    
    public function index()
    {
        $filters = [];

        if ($this->request->getGet('max_price')) {
            $filters['max_price'] = (float) $this->request->getGet('max_price');
        }

        if ($this->request->getGet('min_price')) {
            $filters['min_price'] = (float) $this->request->getGet('min_price');
        }

        $products = !empty($filters)
            ? $this->productModel->filterProducts($filters)
            : $this->productModel->findAll();

        $randomItems = $this->productModel->getRandomItems(5);

        echo view('templates/header');
        echo view('playstationconsoles', [
            'products' => $products,
            'randomItems' => $randomItems
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
        echo view('playstationconsoles', [
            'products' => $results,
            'keyword' => $keyword
        ]);
       
    }
}
