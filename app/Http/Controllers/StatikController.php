<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rkt;

class StatikController extends Controller
{
    static function rkt($id) {
        return Rkt::where('parent_rkt', $id)->get();
    }
}
