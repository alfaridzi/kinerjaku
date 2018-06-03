<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rkt extends Model
{
    protected $table    =   'rkt';

    protected $guarded  =   ['rkt_id'];

    public $timestamp   =   false;
}
