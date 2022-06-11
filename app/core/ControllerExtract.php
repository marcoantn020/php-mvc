<?php

namespace app\core;

class ControllerExtract
{
    
    public static function extract()
    {
        $uri = Uri::uri();
        $controller = 'Home';
        if (isset($uri[0]) and $uri[0] !== '') {
            $controller = ucfirst($uri[0]);
        }

        $namespaceController = "app\\controllers\\" . $controller . "Controller";

        if (class_exists($namespaceController)) {
            $controller = $namespaceController;
        }

        return $controller;
    }
}