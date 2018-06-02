<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use CrudTrait;

    protected $table        = 'slideshow'; 
	protected $primaryKey   = 'slideshow_id'; 
    protected $fillable     = ['image', 'deksripsi','judul', 'featured'];

    
}
