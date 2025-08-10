<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions'; // Name of the database table

    protected $primaryKey = 'id'; // Primary key of the table

    protected $allowedFields = ['product_id', 'user_id', 'quantity', 'transaction_date']; // Fields that can be filled

    protected $useTimestamps = true; // Enable automatic timestamping (created_at, updated_at)

    protected $createdField = 'created_at'; // Name of the created_at field

    protected $updatedField = 'updated_at'; // Name of the updated_at field
}
