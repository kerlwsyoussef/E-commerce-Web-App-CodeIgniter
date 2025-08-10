<?php

namespace App\Models;

use CodeIgniter\Model;

class SearchModel extends Model
{
    protected $table = 'products';

    public function search($keyword)
    {
        return $this->like('productname', $keyword)->findAll();
    }
}

