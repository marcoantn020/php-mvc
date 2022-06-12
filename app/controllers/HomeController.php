<?php

namespace app\controllers;

use app\models\activerecord\FindAll;
use app\models\User;

class HomeController
{
    public $data = [];
    public string $view;

    public function index ()
    {
        $users = (new User)->execute(new FindAll());

        $this->view = 'home.php';
        $this->data = [
            'title' => 'Home',
            'users' => $users
        ];
    }
}