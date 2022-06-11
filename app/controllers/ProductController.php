<?php

namespace app\controllers;

class ProductController
{
    public array $data = [];
    public string $view;
    
    public function index (array $args)
    {
        
    }

    public function show ()
    {
        
    }

    public function edit (array $args)
    {
        $this->view = 'edit.php';
        $this->data = [
            'title' => 'Edit'
        ];
    }
}