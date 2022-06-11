<?php

namespace app\models;

use app\models\activerecord\ActiveRecord;

class User extends ActiveRecord
{
    protected ?string $table = "tbl_user";
}