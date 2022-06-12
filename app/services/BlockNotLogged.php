<?php

namespace app\services;

use app\interfaces\ControllerInterface;

class BlockNotLogged
{
    
    public static function block(ControllerInterface $controllerInterface, array $blockMethods)
    {
        $canBlockMethds = Block::getMethodToBlock($controllerInterface, $blockMethods);
        if (!isset($_SESSION['user']) and $canBlockMethds) {
            BlockPostRequest::blockPost($canBlockMethds);
        }
    }
}