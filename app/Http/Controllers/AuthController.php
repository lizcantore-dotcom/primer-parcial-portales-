<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    // funcion de registrar usuarios
    public function registerForm()
{
    return view('auth.register');
}


public function registerProcess(Request $request)
{
$request->validate([
    'name' => 'required|min:3',
    'email' => 'required',
    'password' => 'required|min:6',
], [
    'name.required' => 'El campo nombre es obligatorio.',
    'name.min' => 'El nombre debe tener al menos :min caracteres.',
    'email.required' => 'El campo email es obligatorio.',
    'password.required' => 'El campo contraseña es obligatorio.',
    'password.min' => 'La contraseña debe tener al menos :min caracteres.',
]);

if ($request->password !== $request->password_confirmation) {
    return back()
        ->withInput()
        ->with('feedback.message', 'Las contraseñas no coinciden.');
}

$data = $request->only(['name', 'email', 'password']);

User::create($data);

return to_route('auth.login.form')
    ->with('feedback.message', '¡Usuario registrado con éxito! Ya podés iniciar sesión.');

}
}

