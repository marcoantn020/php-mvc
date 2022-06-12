<?php

namespace app\services\validate;

use app\interfaces\ValidateInterface;
use app\services\FlashMessage;
use app\services\OldFieldValue;

class ValidateEmail implements ValidateInterface
{
    public function handle ($field, $param)
    {
        $isEmail = filter_input(INPUT_POST, $field, FILTER_SANITIZE_EMAIL);
        if (!$isEmail) {
            FlashMessage::set($field, 'E-mail Invalido!');
            return false;
        }
        OldFieldValue::set($field, $isEmail);
        return filter_input(INPUT_POST, $field, FILTER_SANITIZE_EMAIL);
    }
}