<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\UserBilling;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegistroGlider3Controller extends Controller
{
    public function storeStep3(Request $request)
    {
        // OBTENER USUARIO REAL
        $inicioSesion = Auth::user();        // inicio_sesion
        $user = $inicioSesion->user;         // users
        $usuarioId = $user->id;              // ID correcto para freelancers

        // Obtener freelancer
        $freelancer = Freelancer::where('id_user', $usuarioId)->firstOrFail();

        //dd($request->all());

        // Validación dinámica
        $request->validate([
            'type_user_suscribe' => 'required|in:FREELANCER,ORGANIZATION',
            'register_sat'       => 'nullable|in:0,2',
        ]);

        // CORRECCIÓN: determinar register_sat según el tipo de usuario
        $registerSat = $request->type_user_suscribe === 'ORGANIZATION'
            ? 2   // Empresas siempre necesitan facturación
            : ($request->register_sat ?? 0);

        // Actualizar tipo de usuario
        $freelancer->type_user_suscribe = $request->type_user_suscribe;
        $freelancer->register_sat = $request->register_sat;
        $freelancer->save();

        // Caso 1: Freelancer sin SAT → no pide factura
        if ($request->type_user_suscribe === 'FREELANCER' && $request->register_sat == 0) {
            return back()->with('success', 'Paso 3 completado sin requisitos de facturación.');
        }

        // Caso 2: Negocio/Empresa o Freelancer con SAT → necesita form de facturación
        $request->validate([
            'type_person' => 'required|in:MORAL,FISICA',
            'tradename' => 'required|string',
            'rfc' => 'required|string|max:13',
            'street' => 'required',
            'outdoor_number' => 'required|integer',
            'inner_number' => 'required',
            'suburb' => 'required',
            'pc' => 'required|integer',
            'url_acta_constitutiva' => 'nullable|file|mimes:pdf',
            'url_rfc' => 'nullable|file|mimes:pdf',
        ]);
        

        // PREPARAR DATOS PARA GUARDAR
        $data = $request->except([
            'type_user_suscribe',
            'register_sat',
            '_token',
        ]);

        // Carpeta personalizada dentro de storage/app/public
        $folder = 'profiles/' . $user->name;

        // GUARDAR PDF DEL ACTA
        if ($request->hasFile('url_acta_constitutiva')) {
            $data['url_acta_constitutiva'] =
                $request->file('url_acta_constitutiva')
                    ->storeAs($folder, 'acta_constitutiva.pdf', 'public');
        }

        // GUARDAR PDF DEL RFC
        if ($request->hasFile('url_rfc')) {
            $data['url_rfc'] =
                $request->file('url_rfc')
                    ->storeAs($folder, 'rfc.pdf', 'public');
        }

        // GUARDAR / ACTUALIZAR REGISTRO
        UserBilling::updateOrCreate(
            ['user_id' => $usuarioId],
            $data
        );

        return back()->with('success', 'Paso 3 completado correctamente');
    }

}
