<?php

namespace app\services;

class OldFieldValue
{
    public static function set ($key, $value, $alert = 'danger')
    {
        if (!isset($_SESSION['old'][$key])) {
            $_SESSION['old'][$key] = $value;
        }
    }

    public static function get ($key)
    {
        if (isset($_SESSION['old'][$key])) {
            $flash = $_SESSION['old'][$key];
            unset($_SESSION['old'][$key]);
            return $flash;
        }
    }
}