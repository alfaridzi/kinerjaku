<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iku extends Model
{
    protected $table    =   'iku';

    protected $guarded  =   ['iku_id'];

    public $timestamp   =   false;
}
