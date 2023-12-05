<?php

namespace app\models;

use app\models\activerecord\Activerecord;

class Reserve extends Activerecord
{
    protected $table = 'reservations';
}