<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    protected $table    =   'pengukuran';

    protected $guarded  =   ['id'];

    public $timestamp   =   false;
}
