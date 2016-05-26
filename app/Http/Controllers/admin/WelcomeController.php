<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index(Request $request)
    {
        $password_first = $request->input('pass_first');
        if($password_first === '123'){
            return view('admin.login');
        }else{
            return back()->with('status_error','کلمه عبور اشتباه است');
        }

    }
}
