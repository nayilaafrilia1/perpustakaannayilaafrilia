<?php

/*
|--------------------------------------------------------------------------
| app/Http/Controllers/Auth/ControllerLoginHistory.php
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ControllerLoginHistory extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN HISTORY
    |--------------------------------------------------------------------------
    |
    | Nanti bisa dipakai untuk:
    | - mencatat login user
    | - ip address
    | - browser
    | - waktu login
    | - logout
    |
    */

    public function index()
    {
        return view('user.loginhistory.index');
    }
}
