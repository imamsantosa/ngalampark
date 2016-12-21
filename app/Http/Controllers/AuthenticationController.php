<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if(Admin::Authentication($creds)){
            return redirect()->route('admin-home');
        }

        return redirect()->route('login')
            ->with([
                'status' => 'danger',
                'message' => 'Username atau password salah!'
            ]);
    }
}
