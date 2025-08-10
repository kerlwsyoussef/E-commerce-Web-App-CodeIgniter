<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'content', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $validationRules = [
        'title' => 'required|max_length[255]',
        'content' => 'required'
    ];
    protected $validationMessages = [
        'title' => [
            'required' => 'The title field is required.',
            'max_length' => 'The title field cannot exceed 255 characters.'
        ],
        'content' => [
            'required' => 'The content field is required.'
        ]
    ];

    
}
