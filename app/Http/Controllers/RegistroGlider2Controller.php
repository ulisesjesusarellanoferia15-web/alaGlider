<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegistroGlider2Controller extends Controller
{
    public function index()
    {
        $skills = Skill::where('active', 1)->get();
        return view('user.registroGlider', compact('skills'));
    }

    public function store(Request $request)
    {
        $inicioSesion = Auth::user();
        $user = $inicioSesion->user; // Relación definida en InicioSesionModel

        if (!$user) {
            return response()->json([
                'message' => 'No se encontró el usuario asociado a esta cuenta de inicio de sesión.'
            ], 404);
        }

        //Validación
        $validated = $request->validate([
            'description' => 'required|string|max:1000',
            'since_experience' => 'required|integer',
            'level_education' => 'required|string',
            'is_titled' => 'nullable|boolean',
            'type_briefcase' => 'nullable|in:PDF,URL,VIDEO',
            'url_vc' => 'nullable|file|mimes:pdf|max:5120',
            'url_title' => 'nullable|file|mimes:pdf|max:5120',
            'url_professional_license' => 'nullable|file|mimes:pdf|max:5120',
            'projects' => 'nullable',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'other_red' => 'nullable|url|max:255',
        ]);

        // Buscar o crear registro del freelancer
        $freelancer = Freelancer::firstOrNew(['id_user' => $user->id]);

        $freelancer->fill([
            'id' => $freelancer->id ?? Str::uuid(),
            'description' => $validated['description'],
            'since_experience' => $validated['since_experience'],
            'level_education' => $validated['level_education'],
            'is_titled' => $request->boolean('is_titled'),
            'type_briefcase' => $request->type_briefcase,
            'type_user_suscribe' => 'FREELANCER',
            'id_user' => $user->id,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'other_red' => $request->other_red,
        ]);

        // Carpeta personalizada por nombre de usuario (igual que en paso 1)
        $folder = 'profiles/' . $user->name;

        // Subir CV
        if ($request->hasFile('url_vc')) {
            $freelancer->url_vc = $request->file('url_vc')->storeAs($folder, 'cv.pdf', 'public');
        }

        // Subir título
        if ($request->hasFile('url_title')) {
            $freelancer->url_title = $request->file('url_title')->storeAs($folder, 'titulo.pdf', 'public');
        }

        // Subir cédula profesional
        if ($request->hasFile('url_professional_license')) {
            $freelancer->url_professional_license = $request->file('url_professional_license')->storeAs($folder, 'cedula.pdf', 'public');
        }

        // Guardar portafolio
        if ($request->hasFile('projects')) {
            // Si sube PDF o video → guardar en storage
            $freelancer->projects = $request->file('projects')->storeAs($folder, 'portafolio.pdf', 'public');
        } elseif ($request->filled('projects')) {
            // Si es una URL → guardar directamente
            $freelancer->projects = $request->input('projects');
        }

        $freelancer->save();

        // Guardar skills seleccionadas
        if ($request->has('skills')) {
            $skills = collect($request->skills)->mapWithKeys(function ($skillId) {
                return [$skillId => ['id' => (string) \Illuminate\Support\Str::uuid()]];
            });

            $freelancer->skills()->sync($skills);
        }

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Paso 2 completado correctamente');

    }
}
