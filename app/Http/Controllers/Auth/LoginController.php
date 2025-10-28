<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\InicioSesionModel;

class LoginController extends Controller
{
    /**
     * Inicia sesión del usuario.
     */
    public function login(Request $request)
    {
        // Detectar si la petición viene de fetch()
        $isAjax = $request->ajax() || $request->wantsJson() || $request->header('Accept') === 'application/json';

        // Validación manual para evitar redirecciones
        $validator = \Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            if ($isAjax) {
                return response()->json(['errors' => $validator->errors()], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $validator->validated();
        $usuario = \App\Models\InicioSesionModel::where('email', $credentials['email'])->first();

        if (!$usuario) {
            $error = ['email' => ['El correo electrónico no está registrado.']];
            return $isAjax
                ? response()->json(['errors' => $error], 422)
                : back()->withErrors($error);
        }

        if ($usuario->confirmed != 1) {
            $error = ['email' => ['Tu cuenta no ha sido confirmada. Verifica tu correo.']];
            return $isAjax
                ? response()->json(['errors' => $error], 422)
                : back()->withErrors($error);
        }

        if (!\Hash::check($credentials['password'], $usuario->password)) {
            $error = ['password' => ['La contraseña es incorrecta.']];
            return $isAjax
                ? response()->json(['errors' => $error], 422)
                : back()->withErrors($error);
        }

        \Auth::login($usuario, $request->boolean('remember'));

        if ($isAjax) {
            return response()->json(['success' => true, 'redirect' => route('index')]);
        }

        return redirect()->route('index')->with('success', 'Inicio de sesión exitoso.');
    }



    /**
     * Cierra la sesión del usuario.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')->with('success', 'Sesión cerrada correctamente.');
    }
}
