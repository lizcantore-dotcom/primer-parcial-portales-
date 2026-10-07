<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{   //funcion de login
    public function loginForm()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->only(['email','password' ]);

        if (!Auth::attempt($credentials)) {
            return to_route('auth.login.form')
            ->withInput()
            ->with('feedback.message', 'Las credenciales ingresados no coinciden con nuestros registros.');
        }
        return to_route('productos.index')
        ->with('feedback.message', '¡Sesion iniciada con éxito! Bienvenido');
    }

        //funcion de logout
    public function logout(){
        Auth::logout();
        return to_route('auth.login.form')
        ->with('feedback.message', 'Has cerrado sesión correctamente.');
    }
}

