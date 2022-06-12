<?php

namespace app\controllers;

use app\models\activerecord\FindBy;
use app\models\User;
use Exception;

class UserController
{
    public array $data  = [];
    public string $view;

    public function show (array $args)
    {
        $user = (new User)->execute(new FindBy('id', $args[0]));
        if (!$user) {
            throw new Exception("Usuario não encontrado");
        }
        $this->view = 'user/show.php';
        $this->data = [
            'title' => 'show',
            'user' => $user
        ];
    }
}