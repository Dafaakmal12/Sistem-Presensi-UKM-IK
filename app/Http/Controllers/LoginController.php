<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email atau password salah',
            ]);
        }
        if($user->password !== $credentials['password']){
            return back()->withErrors([
                'email' => 'Email atau password salah',
            ]);
        }

        Auth::login($user);

        if ($user->role == 'admin') {
            return redirect()->intended('admin');
        } else {
            return redirect()->intended('user');
        }


        return back()->withErrors([
            'email' => 'anjeeeennggg',
        ]);
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
