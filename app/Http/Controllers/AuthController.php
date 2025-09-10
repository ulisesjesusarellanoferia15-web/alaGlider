<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('register');
    }

    // Registrar usuario
    public function register(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'username' => 'required|string|max:255|unique:inicio_sesion',
            'email' => 'required|email|unique:inicio_sesion',
            'password' => 'required|min:6|',
        ]);

        // Generar ID aleatorio
        do {
            $uuid = (string) Str::uuid();
        } while (User::where('id', $uuid)->exists()); // Evitar duplicados

        $user = User::create([
            'id' => $uuid,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Inicia sesión automáticamente
        return redirect()->route('index');
    }

    // Mostrar formulario de login
    public function showLogin()
    {
        return view('login');
    }

    // Iniciar sesión
    public function login(Request $request)
    {
        //dd($request->all());


        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
