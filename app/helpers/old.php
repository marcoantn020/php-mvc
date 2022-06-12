<?php

use app\services\OldFieldValue;

function old ($field) 
{
    return OldFieldValue::get($field);
}