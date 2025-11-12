<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\UserModel;
use App\Models\InicioSesionModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    // --- Google ---
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        return $this->loginOrRegister($googleUser, 2); // 2 = Google
    }

    // --- Facebook ---
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')
            ->scopes(['email'])
            ->stateless()
            ->redirect();
    }

    public function handleFacebookCallback()
    {
        $fbUser = Socialite::driver('facebook')->stateless()->user();
        return $this->loginOrRegister($fbUser, 3); // 3 = Facebook
    }

    // --- Método común para registrar o loguear ---
    protected function loginOrRegister($socialUser, $providerId)
    {
        // Revisar si existe el usuario por email
        $inicioSesion = InicioSesionModel::where('email', $socialUser->getEmail())->first();

        if (!$inicioSesion) {
            // Crear registro en inicio_sesion
            $inicioSesion = InicioSesionModel::create([
                'id' => Str::uuid(),
                'email' => $socialUser->getEmail(),
                'username' => explode('@', $socialUser->getEmail())[0] . rand(10,99),
                'password' => Hash::make(Str::random(16)),
                'remember_token' => Str::random(60),
                'confirmed' => 1, // ya confirmado por OAuth
            ]);

            // Crear registro en users con valores por defecto seguros
            UserModel::create([
                'id' => Str::uuid(),
                'name' => $socialUser->getName() ?? $socialUser->user['name'] ?? '',
                'lastname' => $socialUser->user['family_name'] ?? '',
                'picture_profile' => $socialUser->getAvatar() ?? null,
                'id_country' => '00000000-0000-0000-0000-000000000000',
                'sex_id' => 3,
                'profile_id' => 3,
                'status_id' => 1,
                'provider_id' => $providerId,
                'social_id' => $socialUser->getId(),
                'id_inicio_sesion' => $inicioSesion->id,
                'phone' => null,
            ]);
        }

        // Loguear automáticamente al usuario
        Auth::login($inicioSesion);

        return redirect()->route('index');
    }
}
