<?php

namespace app\core;

class FolderExtract
{
    public static function extract ($uri)
    {
        $folder = CONTROLLER_FOLDER_DEFAULT;

        if (isset($uri[0]) and $uri[0] !== '') {
            $folder = $uri[0];
            $dir = ROOT. "/" . CONTROLLER_PATH.strtolower($folder);
            return is_dir($dir) ? $folder : '';
        }
        return $folder;
    }
}