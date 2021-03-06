<?php

namespace app\controllers\site;

use app\models\activerecord\FindAll;
use app\models\User;

class HomeController
{
    public $data = [];
    public string $view;
    public string $master = 'site/index.php';

    public function index ()
    {
        $users = (new User)->execute(new FindAll());

        $this->view = 'site/home.php';
        $this->data = [
            'title' => 'Home',
            'users' => $users
        ];
    }
}