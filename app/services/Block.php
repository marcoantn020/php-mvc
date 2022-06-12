<?php

namespace app\services;

use app\core\MethodExtract;
use app\interfaces\ControllerInterface;

class Block
{
    
    public static function getMethodToBlock(ControllerInterface $controllerInterface, array $blockMethods)
    {
        $methods = get_class_methods($controllerInterface);
        [$actualMethod] = MethodExtract::extract($controllerInterface);

        $block = false;
        foreach ($methods as $method) {
            if (in_array($method, $blockMethods) and $method === $actualMethod) {
                $block = true;
            }
        }
        return $block;
    }
}