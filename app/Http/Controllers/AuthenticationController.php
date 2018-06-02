<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;
use Session;

use Auth;

class AuthenticationController extends Controller
{
    function login(Request $request) {
        if(Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            $p              =   Permission::where('user_id', Auth::user()->id)->get();

            $permission     =   [];

            foreach($p as $per) {
                array_push($permission, $per->permission_id);
            }

            Session::put('role', $permission); 

            return redirect()->back()->with('alert', 'Berhasil Login');
        } else {
            return redirect()->back()->with('alert', 'Gagal Login');
        }
    }

    function logout() {
        Auth::logout();

        Session::flush();

        return redirect()->back()->with('alert', 'Berhasil Logout');
    }
}
