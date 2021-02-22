<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    public function login()
    {
      return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'code_login' => 'required'
        ]);

        if ($request->input('code_login') == env('QPOM_ACCESS_KEY')) {
            $request->session()->put('authenticated', time());
            return redirect()->intended('home');
        }

        return redirect('login')->with('error', 'Ha ocurrido un error al ingresar ');
    }

    public function logout(Request $request) {
      $request->session()->forget('authenticated');
      return redirect('login');
    }
}
