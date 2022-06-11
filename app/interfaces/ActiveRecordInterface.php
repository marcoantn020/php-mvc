<?php

namespace app\interfaces;

interface ActiveRecordInterface
{
    public function execute(ActiveRecordExecuteInterface $activeRecordExecuteInterface);
    public function __set (string $attribute, $value);
    public function __get ($attribute);
    public function getTable ();
    public function getAttributes ();
}