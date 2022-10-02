<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class AuthController extends Controller
{
    function index()
    {
        return view('login');
    }

    // function checkLogin(Request $request)
    // {
    //     $this-> validate($request, [
    //         'email' => 'required|email'
    //     ])
    // }
}
