<?php

namespace app\services\validate;

use app\interfaces\ValidateInterface;
use app\services\FlashMessage;
use app\services\OldFieldValue;

class ValidateMaxlen implements ValidateInterface
{
    public function handle ($field, $param)
    {
        $string = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
        if (strlen($string) > $param) {
            FlashMessage::set($field, "O campo não pode ter mais de {$param} caracters!");
            return false;
        }
        OldFieldValue::set($field, $string);
        return $string;
    }
}