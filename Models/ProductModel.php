<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['productname', 'description', 'price', 'image', 'category'];

    // Get random items
    public function getRandomItems($limit = 10)
    {
        return $this->orderBy('RAND()')->limit($limit)->findAll();
    }

    // Filter products by category or price range
    public function filterProducts($category = null, $minPrice = null, $maxPrice = null)
    {
        $builder = $this->builder();

        if ($category) {
            $builder->where('category', $category);
        }

        if ($minPrice) {
            $builder->where('price >=', $minPrice);
        }

        if ($maxPrice) {
            $builder->where('price <=', $maxPrice);
        }

        return $builder->get()->getResult();
    }
}


