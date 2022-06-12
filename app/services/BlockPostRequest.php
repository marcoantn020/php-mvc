<?php

namespace app\services;

class BlockPostRequest
{
    
    public static function blockPost($canBlockMethds)
    {
        if ($canBlockMethds) {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                require VIEW_PATH. 'denied.php';
                die();
            }
            return redirect("/");
        }
    }
}