<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InicioSesionModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = InicioSesionModel::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Credenciales incorrectas']);
        }

        if ($user->confirmed == 0) {
            return back()->withErrors(['email' => 'Debes verificar tu cuenta primero']);
        }

        Auth::login($user);
        return redirect()->route('index');
    }
}
