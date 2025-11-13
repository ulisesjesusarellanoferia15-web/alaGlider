<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use App\Models\Country;
use App\Models\Sex;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class UserProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user()->user; // relación con UserModel desde InicioSesionModel
        $countries = Country::all();
        $sexes = Sex::all();

        return view('user.editProfile', compact('user', 'countries', 'sexes'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'state' => 'nullable|string|max:100',
            'delegation' => 'nullable|string|max:100',
            'id_country' => 'required|exists:countries,id',
            'sex_id' => 'required|exists:cat_user_sex,id',
            'birth_date' => 'nullable|date',
            'picture_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'identificate' => 'nullable|mimes:pdf|max:2048',
        ]);

        $user = UserModel::where('id_inicio_sesion', Auth::id())->firstOrFail();

        // Si el usuario subió una nueva foto
        if ($request->hasFile('picture_profile')) {
            $file = $request->file('picture_profile');

            // Carpeta personalizada por nombre de usuario
            $folder = 'profiles/' . $user->name;

            // Nombre único del archivo
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Guardar en storage/app/public/profiles/{username}/
            $path = $file->storeAs($folder, $filename, 'public');

            // Eliminar imagen anterior si existe y era local
            if ($user->picture_profile && !Str::startsWith($user->picture_profile, ['http://', 'https://'])) {
                \Storage::disk('public')->delete($user->picture_profile);
            }

            // Actualizar campo en la base
            $user->picture_profile = $path;
        }


        $user->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'state' => $request->state,
            'delegation' => $request->delegation,
            'id_country' => $request->id_country,
            'sex_id' => $request->sex_id,
            'delivery_date' => $request->birth_date,
            'picture_profile' => $user->picture_profile,
            'identificate' => $user->identificate,
        ]);

        return redirect()->route('profile.edit')->with('success', 'Perfil actualizado correctamente.');
    }


}
