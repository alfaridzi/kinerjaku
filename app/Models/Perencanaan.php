<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Perencanaan extends Model
{
    use CrudTrait;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'perencanaan';
    protected $primaryKey = 'perencanaan_id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['tahun', 'unitkerja_id', 'renstra', 'iku_id', 'pk', 'rkt_id','keterangan'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function unitkerja()
    {
        return $this->belongsTo('App\Models\UnitKerja', 'unitkerja_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
