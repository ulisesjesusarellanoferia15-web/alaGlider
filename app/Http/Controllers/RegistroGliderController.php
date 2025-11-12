<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use App\Models\Country;
use App\Models\Sex;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegistroGliderController extends Controller
{
    // Método para la ruta de "Conviértete en Glider"
    public function registroGlider()
    {
        $user = Auth::user()->user;
        $countries = \App\Models\Country::all();
        $sexes = \App\Models\Sex::all();

        return view('user.registroGlider', compact('user', 'countries', 'sexes'));
    }

    // Nuevo método para enviar el primer paso del registro
    public function storeStep1(Request $request)
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

        // Obtenemos al usuario actual
        $user = UserModel::where('id_inicio_sesion', Auth::id())->firstOrFail();

        // === FOTO DE PERFIL ===
        if ($request->hasFile('picture_profile')) {
            $file = $request->file('picture_profile');
            $folder = 'profiles/' . $user->name;
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs($folder, $filename, 'public');

            // Eliminar imagen anterior si existe
            if ($user->picture_profile && !Str::startsWith($user->picture_profile, ['http://', 'https://'])) {
                \Storage::disk('public')->delete($user->picture_profile);
            }

            $user->picture_profile = $path;
        }

        // === INE / IDENTIFICACIÓN ===
        if ($request->hasFile('identificate')) {
            $ine = $request->file('identificate');
            $folder = 'profiles/' . $user->name;
            $ineName = 'identification.' . $ine->getClientOriginalExtension();
            $inePath = $ine->storeAs($folder, $ineName, 'public');

            // Eliminar anterior si existe
            if ($user->identificate && !Str::startsWith($user->identificate, ['http://', 'https://'])) {
                \Storage::disk('public')->delete($user->identificate);
            }

            $user->identificate = $inePath;
        }

        // === ACTUALIZAR CAMPOS ===
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

        return redirect()->back()->with('success', 'Paso 1 completado correctamente. Los datos se guardaron.');
    }
}