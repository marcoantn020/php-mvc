<?php

namespace app\controllers\site;

class ProductController
{
    public array $data = [];
    public string $view;
    public string $master = 'site/index.php';
    
    public function index (array $args)
    {
        $this->view = 'edit.php';
        $this->data = [
            'title' => 'index'
        ];
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