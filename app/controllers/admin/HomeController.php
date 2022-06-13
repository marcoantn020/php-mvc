<?php

namespace app\controllers\admin;

use app\interfaces\ControllerInterface;

class HomeController implements ControllerInterface
{
    public $data = [];
    public string $view;
    public string $master = 'admin/index.php';

    public function index (array $args)
    {
        $this->view = 'admin/home.php';
        $this->data = [
            'title' => 'Home ADMIN',
        ];
    }

    public function show (array $args)
    {

    }

    public function edit (array $args)
    {

    }

    public function update (array $args)
    {

    }

    public function store ()
    {

    }

    public function destroy (array $args)
    {

    }

}
