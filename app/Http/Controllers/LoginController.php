<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (auth()->attempt($credentials)) {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->back()->with('error', 'Hata oluştu. Lütfen tekrar deneyiniz.');
            }
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}

