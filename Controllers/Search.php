<?php

namespace App\Controllers;

use App\Models\SearchModel;
use CodeIgniter\Controller;

class Search extends Controller
{
    public function searchSuggestions()
    {
        if ($this->request->getMethod() === 'post') {
            $keyword = $this->request->getVar('keyword');
            $model = new SearchModel();
            
            $results = $model->search($keyword);
            
            return $this->response->setJSON($results);
        }
        
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Page not found');
    }
}



