<?php
// app/Http/Controllers/Auth/RegisterController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\InicioSesionModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validación de los campos según tu formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:inicio_sesion,username',
            'email' => 'required|string|email|max:255|unique:inicio_sesion,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:15',
            'id_country' => 'required|exists:countries,id', 
            'sex_id' => 'required|in:1,2,3',           
        ]);

        // Generar token de verificación
        $codigoVerificacion = rand(100000, 999999);

        // Crear registro en inicio_sesion
        $inicioSesion = InicioSesionModel::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
            'token_confirmacion' => Crypt::encrypt($codigoVerificacion),
            'confirmed' => 0,
        ]);

        // Crear usuario asociado
        UserModel::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'picture_profile' => $request->picture_profile ?? null,
            'id_country' => $request->id_country,
            'state' => $request->state ?? null,
            'delegation' => $request->delegation ?? null,
            'sex_id' => $request->sex_id,
            'delivery_date' => $request->delivery_date ?? null,
            'phone' => $request->phone,
            'identificate' => $request->identificate ?? null,
            'status_id' => 1, // Activo por default
            'provider_id' => 1, // Registro por plataforma
            'social_id' => $request->social_id ?? null,
            'profile_id' => 3, // Rider por default
            'id_inicio_sesion' => $inicioSesion->id,
        ]);

        // Enviar correo con el código de verificación usando Gmail
        Mail::raw("Tu código de verificación es: {$codigoVerificacion}", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Verificación de cuenta');
        });

        return response()->json([
            'success' => true,
            'message' => 'Usuario registrado correctamente. Revisa tu correo para verificar tu cuenta.'
        ]);
    }

    public function verify(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required|string', // coincide con tu input id="verification_code"
        ]);

        $inicioSesion = InicioSesionModel::where('email', $request->email)->first();

        if (!$inicioSesion) {
            return response()->json(['success' => false, 'message' => 'Usuario no encontrado']);
        }

        if (Crypt::decrypt($inicioSesion->token_confirmacion) == $request->verification_code) {
            $inicioSesion->confirmed = 1;
            $inicioSesion->token_confirmacion = null;
            $inicioSesion->save();

            return response()->json(['success' => true, 'message' => 'Cuenta verificada correctamente']);
        }

        return response()->json(['success' => false, 'message' => 'Código incorrecto']);
    }
}