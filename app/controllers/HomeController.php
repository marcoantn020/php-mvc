<?php

namespace app\controllers;

class HomeController
{
    public $data = [];
    public string $view;

    public function index ()
    {
        $this->view = 'home.php';
        $this->data = [
            'title' => 'Home'
        ];
    }
}