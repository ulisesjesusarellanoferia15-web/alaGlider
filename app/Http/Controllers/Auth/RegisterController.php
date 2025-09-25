<?php
// app/Http/Controllers/Auth/RegisterController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:users',
            'gender'    => 'required|string',
            'country'   => 'required|string',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone'     => 'required|string|max:15',
            'password'  => 'required|string|min:8|confirmed',
        ]);

        // Generar código OTP
        $verificationCode = rand(100000, 999999);

        // Crear usuario
        $user = User::create([
            'name'              => $request->name,
            'lastname'          => $request->lastname,
            'username'          => $request->username,
            'gender'            => $request->gender,
            'country'           => $request->country,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'password'          => bcrypt($request->password),
            'verification_code' => $verificationCode,
            'confirmed'         => false,
        ]);

        // Enviar correo con código
        Mail::raw("Tu código de verificación es: $verificationCode", function($message) use ($user) {
            $message->to($user->email)
                    ->subject('Código de verificación - AlaGlider');
        });

        return response()->json([
            'success' => true,
            'message' => 'Usuario registrado. Revisa tu correo para el código de verificación.',
        ]);
    }
}
