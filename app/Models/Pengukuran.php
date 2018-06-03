<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    protected $table    =   'pengukuran';
    protected $primaryKey = 'pengukuran_id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['tahun', 'unitkerja_id', 'tw1', 'tw2', 'tw3', 'tw4'];
}
