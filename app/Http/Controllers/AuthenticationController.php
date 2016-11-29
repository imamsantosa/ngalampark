<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login()
    {
        return View('admin/login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }

    public function loginProcess(Request $request)
    {
        $creds = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        if(auth()->attempt($creds)){
            return redirect()->route('admin-home');
        }

        return redirect()->route('login')
            ->with([
                'status' => 'danger',
                'message' => 'Username atau password salah!'
            ]);
    }
}
