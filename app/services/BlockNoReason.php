<?php

namespace app\services;

use app\interfaces\ControllerInterface;

class BlockNoReason
{
    public static function block(ControllerInterface $controllerInterface, array $blockMethods)
    {
        $canBlockMethds = Block::getMethodToBlock($controllerInterface, $blockMethods);
        BlockPostRequest::blockPost($canBlockMethds);
    }
}