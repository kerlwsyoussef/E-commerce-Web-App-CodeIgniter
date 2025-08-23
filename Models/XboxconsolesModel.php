<?php

namespace App\Models;

use CodeIgniter\Model;

class XboxconsolesModel extends Model
{
    protected $table = 'xboxconsoles'; // MySQL table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['productname', 'description', 'price', 'image','category'];
    protected $returnType = 'array'; // Return arrays instead of objects

    /**
     * Get random items
     */
    public function getRandomItems($limit = 5)
    {
        return $this->orderBy('RAND()')->limit($limit)->findAll();
    }

    /**
     * Filter products by price range
     */
    public function filterProducts($filters = [], $sort = null)
    {
        $builder = $this->builder();
    
        if (!empty($filters['category'])) {
            $builder->where('category', $filters['category']);
        }
        if (!empty($filters['min_price'])) {
            $builder->where('price >=', $filters['min_price']);
        }
        if (!empty($filters['max_price'])) {
            $builder->where('price <=', $filters['max_price']);
        }
    
        // Sorting
        switch ($sort) {
            case 'price_asc':  $builder->orderBy('price', 'ASC'); break;
            case 'price_desc': $builder->orderBy('price', 'DESC'); break;
            case 'name_asc':   $builder->orderBy('productname', 'ASC'); break;
            case 'name_desc':  $builder->orderBy('productname', 'DESC'); break;
            default: $builder->orderBy('id', 'DESC'); break;
        }
    
        return $builder->get()->getResultArray();
    }

    /**
     * Search products by keyword
     */
    public function searchProducts($keyword)
    {
        return $this->like('productname', $keyword)
                    ->orLike('description', $keyword)
                    ->findAll();
    }

    /**
     * Get single product by ID
     */
    public function getProductById($id)
    {
        return $this->find($id);
    }
}
