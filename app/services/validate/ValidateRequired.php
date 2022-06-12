<?php

namespace app\services\validate;

use app\interfaces\ValidateInterface;
use app\services\FlashMessage;
use app\services\OldFieldValue;

class ValidateRequired implements ValidateInterface
{
    public function handle ($field, $param)
    {
        $string = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
        if ($string === '') {
            FlashMessage::set($field, 'O Campo é obrigatorio');
            return false;
        }
        OldFieldValue::set($field, $string);
        return $string;
    }
}