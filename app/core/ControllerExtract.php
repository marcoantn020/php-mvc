<?php

namespace app\core;

class ControllerExtract
{
    
    public static function extract()
    {
        $uri = Uri::uri();

        $folder = FolderExtract::extract($uri);
        
        if ($folder) {
            $controller = Uri::uriExist($uri, 1);
            $namespaceController = "app\\controllers\\". $folder . "\\";
        } else {
            $controller = Uri::uriExist($uri, 0);
            $namespaceController = "app\\controllers\\" . CONTROLLER_FOLDER_DEFAULT ."\\";
        }

        if (!$controller) {
            $controller = CONTROLLER_DEFAULT;
        }
        
        $controller = $namespaceController. ucfirst($controller) . "Controller";

        if (class_exists($controller)) {
            return $controller;
        }

        throw new \Exception("Esse Controller não existe.");
    }
}