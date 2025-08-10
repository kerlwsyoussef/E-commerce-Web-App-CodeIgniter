<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['productname', 'description', 'price', 'image'];

    public function getRandomItems($limit = 10)
    {
        // Ensure the limit is applied correctly
        return $this->orderBy('RAND()')->limit($limit)->findAll();
    }
}
