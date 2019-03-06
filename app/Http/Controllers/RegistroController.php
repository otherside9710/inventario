<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegistroController extends Controller
{
    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->cedula = $request->cedula;
        $user->telefono = $request->telefono;
        $user->role = $request->role;
        $user->save();
        Session::put('success', 'Usuario Creado Correctamente.');
        return redirect()->route('home');
    }
}
