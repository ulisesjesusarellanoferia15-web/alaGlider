<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosBancarios;
use App\Models\Bank;
use App\Models\Freelancer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegistroGlider4Controller extends Controller
{
    public function store(Request $request)
    {
        $inicioSesion = Auth::user(); // login con inicio_sesion
        $user = $inicioSesion->user;

        if (!$user) {
            return back()->withErrors(['user' => 'No se encontró el usuario.']);
        }

        $freelancer = Freelancer::where('id_user', $user->id)->first();

        if (!$freelancer) {
            return back()->withErrors(['freelancer' => 'Debes completar el Paso 2 antes de continuar.']);
        }

        /** VALIDACIONES **/
        $validated = $request->validate([
            'account_number' => 'required|string|max:255',
            'clabe' => 'required|string|max:255',
            'bank_id' => 'required|exists:banks,id',
            'bank_certification' => 'required|file|mimes:pdf|max:5120',
            'terms_conditions' => 'required|boolean'
        ]);

        /** SUBIR PDF **/
        $folder = 'profiles/' . $user->name;

        $urlCountState = $request->file('bank_certification')
            ->storeAs($folder, 'estado_de_cuenta.pdf', 'public');

        /** GUARDAR EN BD **/
        DatosBancarios::updateOrCreate(
            ['id_freelancer' => $freelancer->id],
            [
                'count_number' => $validated['account_number'],
                'interbank_clabe' => $validated['clabe'],
                'url_count_state' => $urlCountState,
                'id_bank' => $validated['bank_id'],
            ]
        );

        return back()->with('success', 'Paso 4 completado correctamente 🎉');
    }
}
