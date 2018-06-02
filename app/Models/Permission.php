<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table    =   'permission_users';

    protected $filable  =   ['user_id', 'permission_id'];
}
