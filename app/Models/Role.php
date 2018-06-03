<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table      =  'role_users';

    protected $fillable   =   ['role_id', 'user_id'];
}
