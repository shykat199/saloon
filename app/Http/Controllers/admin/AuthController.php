<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logInPage()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $userName = $request->post('userName');
        $password = $request->post('password');

        if (Auth::attempt(['email'=>$userName,'password'=>$password]) || Auth::attempt(['phone'=>$userName,'password'=>$password])){
            toast('Login Successfully', 'success');
            return to_route('admin.dashboard');
        }
    }

    public function registerPage()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {

    }
}
