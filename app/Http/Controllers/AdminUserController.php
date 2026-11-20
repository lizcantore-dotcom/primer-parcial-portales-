<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // Listado de todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Detalle de un usuario específico
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }
}

