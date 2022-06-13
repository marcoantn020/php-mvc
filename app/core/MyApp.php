<?php

namespace app\core;

use app\interfaces\AppInterface;
use Exception;

class MyApp
{
    private $controller;
    private $controllerInterface;
    
    public function __construct (AppInterface $c)
    {
        $this->controllerInterface = $c;
    }

    public function handleController()
    {
        $controller = $this->controllerInterface->controller();
        $method = $this->controllerInterface->method($controller);
        $params = $this->controllerInterface->params();
        
        $this->controller = new $controller;
        $this->controller->$method($params);
    }

    public function handleView ()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!isset($this->controller->data)) {
                throw new Exception("A propriedade data é obrigatoria");
            }
            if (!array_key_exists('title', $this->controller->data)) {
                throw new Exception("A propriedade title é obrigatorio em data");
            }
            
            extract($this->controller->data);
            require "../app/views/". $this->controller->master;
        }
    }
}