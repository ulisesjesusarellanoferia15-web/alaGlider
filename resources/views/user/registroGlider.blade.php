@extends('partials.master')
@php use Illuminate\Support\Str; @endphp
@section('content')

<div class="container mt-5">
  <div class="card shadow-lg border-0 rounded-4 p-4 mx-auto" style="max-width: 900px;">
    <h4 class="text-center fw-bold mb-4">Conviértete en Glider</h4>

    @if (session('success'))
      <div class="alert alert-success text-center rounded-pill py-2">{{ session('success') }}</div>
    @endif

    {{-- Paso 1: Información Personal --}}
    <form id="step1-form" method="POST" action="{{ route('glider.store.step1') }}" enctype="multipart/form-data" class="row g-3">
      @csrf

      <!-- Imagen de perfil -->
      <div class="col-md-4 text-center">
        <img id="preview-image"
          src="{{ $user->picture_profile 
                ? (Str::startsWith($user->picture_profile, ['http://', 'https://']) 
                    ? $user->picture_profile 
                    : asset('storage/'.$user->picture_profile)) 
                : asset('assets/img/avatars/1.png') }}"
          alt="Foto de perfil"
          class="img-fluid rounded-circle border mb-3"
          style="width: 150px; height: 150px; object-fit: cover;">

        <div>
          <label for="picture_profile" class="form-label btn btn-outline-primary btn-sm" style="background-color: #1877F2; color: #fff;">Subir nueva foto</label>
          <input type="file" id="picture_profile" name="picture_profile" class="d-none" accept="image/*">
        </div>
      </div>

      <!-- Datos -->
      <div class="col-md-8">
        <div class="row">

          <!-- Usuario y correo -->
          <div class="col-md-6">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" class="form-control" id="username" name="username" 
                   value="{{ Auth::user()->username }}" readonly>
          </div>

          <div class="col-md-6">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="{{ Auth::user()->email }}" readonly>
          </div>

          <!-- Nombre y apellidos -->
          <div class="col-md-6">
            <label for="name" class="form-label">Nombre(s)*</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="{{ old('name', $user->name) }}" required>
          </div>

          <div class="col-md-6">
            <label for="lastname" class="form-label">Apellidos*</label>
            <input type="text" class="form-control" id="lastname" name="lastname" 
                   value="{{ old('lastname', $user->lastname) }}" required>
          </div>

          <!-- Ciudad y delegación -->
          <div class="col-md-6">
            <label for="state" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="state" name="state" 
                   value="{{ old('state', $user->state) }}">
          </div>

          <div class="col-md-6">
            <label for="delegation" class="form-label">Alcaldía o municipio / Departamento</label>
            <input type="text" class="form-control" id="delegation" name="delegation" 
                   value="{{ old('delegation', $user->delegation) }}">
          </div>

          <!-- País y género -->
          <div class="col-md-6">
            <label for="id_country" class="form-label">País*</label>
            <select class="form-control" name="id_country" id="id_country" required>
              <option value="">Seleccione un país</option>
              @foreach($countries as $country)
                <option value="{{ $country->id }}" {{ $country->id == $user->id_country ? 'selected' : '' }}>
                  {{ $country->name }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="col-md-6">
            <label for="sex_id" class="form-label">Género*</label>
            <select class="form-control" name="sex_id" id="sex_id" required>
              <option value="">Seleccione género</option>
              @foreach($sexes as $sex)
                <option value="{{ $sex->id }}" {{ $sex->id == $user->sex_id ? 'selected' : '' }}>
                  {{ $sex->name }}
                </option>
              @endforeach
            </select>
          </div>

          <!-- Teléfono y fecha de nacimiento -->
          <div class="col-md-6">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="phone" name="phone" 
                   value="{{ old('phone', $user->phone) }}">
          </div>

          <div class="col-md-6">
            <label for="birth_date" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" 
                    value="{{ old('birth_date', $user->delivery_date) }}">
          </div>

          <div class="col-md-12">
            <label for="identificate" class="form-label">Identifícate (PDF de identificación oficial)*</label>
            <input type="file" class="form-control" id="identificate" name="identificate" accept="application/pdf" required>
            <small class="text-muted">Sube un archivo PDF con tu identificación oficial escaneada.</small>
          </div>

          <div class="col-12 text-center mt-4">
            <button type="submit" id="btn-continuar" class="btn btn-primary rounded-pill px-5">Continuar</button>
          </div>
        </div>
      </div>
    </form>

    {{-- Paso 2 (oculto inicialmente) --}}
    <div id="step2" class="mt-4" style="display:none;">
      {{-- Aquí se cargará dinámicamente el segundo formulario --}}
      <form id="step2-form" class="row g-3" enctype="multipart/form-data">
        @csrf

        <h5 class="fw-bold text-center mb-3">Información profesional</h5>

        <!-- Experiencia desde -->
        <div class="col-md-6">
            <label for="since_experience" class="form-label">Experiencia desde*</label>
            <input type="number" min="1950" max="{{ date('Y') }}" class="form-control" id="since_experience" name="since_experience" placeholder="Ej. 2019" required>
        </div>

        <!-- CV -->
        <div class="col-md-6">
            <label for="url_vc" class="form-label">Currículum (PDF)*</label>
            <input type="file" class="form-control" id="url_vc" name="url_vc" accept="application/pdf" required>
        </div>

        <!-- Tipo de portafolio -->
        <div class="col-md-6">
            <label for="type_briefcase" class="form-label">Tipo de portafolio*</label>
            <select class="form-select" id="type_briefcase" name="type_briefcase" required>
            <option value="">Seleccione una opción</option>
            <option value="PDF">PDF</option>
            <option value="URL">URL</option>
            <option value="VIDEO">Video</option>
            </select>
        </div>

        <!-- Portafolio -->
        <div class="col-md-6">
            <label for="projects" class="form-label">Archivo o enlace del portafolio*</label>
            <input type="file" class="form-control d-none" id="projects_file" name="projects_file" accept="application/pdf,video/*">
            <input type="url" class="form-control d-none" id="projects_url" name="projects_url" placeholder="https://...">
        </div>

        <!-- Nivel de estudios -->
        <div class="col-md-6">
            <label for="level_education" class="form-label">Nivel de estudios*</label>
            <select class="form-select" id="level_education" name="level_education" required>
            <option value="">Seleccione nivel</option>
            <option value="Bachillerato">Bachillerato</option>
            <option value="Licenciatura">Licenciatura</option>
            <option value="Maestría">Maestría</option>
            <option value="Doctorado">Doctorado</option>
            <option value="Otro">Otro</option>
            </select>
        </div>

        <!-- Titulado -->
        <div class="col-md-6 d-flex align-items-end">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="is_titled" name="is_titled" value="1">
            <label class="form-check-label" for="is_titled">Estoy titulado</label>
            </div>
        </div>

        <!-- Título -->
        <div class="col-md-6">
            <label for="url_title" class="form-label">Título / Profesión (PDF)</label>
            <input type="file" class="form-control" id="url_title" name="url_title" accept="application/pdf">
        </div>

        <!-- Cédula -->
        <div class="col-md-6">
            <label for="url_professional_license" class="form-label">Cédula profesional (PDF)</label>
            <input type="file" class="form-control" id="url_professional_license" name="url_professional_license" accept="application/pdf">
        </div>

        <!-- Skills -->
        <div class="col-md-12">
            <label class="form-label">Selecciona tus habilidades*</label>
            <div class="row">
            @foreach(\App\Models\Skill::all() as $skill)
                <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="skill_{{ $skill->id }}" name="skills[]" value="{{ $skill->id }}">
                    <label class="form-check-label" for="skill_{{ $skill->id }}">{{ $skill->name }}</label>
                </div>
                </div>
            @endforeach
            </div>
        </div>

        <!-- Descripción -->
        <div class="col-md-12">
            <label for="description" class="form-label">Descripción profesional*</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe brevemente tu experiencia y especialidad" required></textarea>
        </div>

        <!-- Redes sociales -->
        <h6 class="fw-bold mt-3">Redes sociales</h6>
        <div class="col-md-6">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="url" class="form-control" id="facebook" name="facebook" placeholder="https://facebook.com/tuusuario">
        </div>

        <div class="col-md-6">
            <label for="instagram" class="form-label">Instagram</label>
            <input type="url" class="form-control" id="instagram" name="instagram" placeholder="https://instagram.com/tuusuario">
        </div>

        <div class="col-md-6">
            <label for="youtube" class="form-label">YouTube</label>
            <input type="url" class="form-control" id="youtube" name="youtube" placeholder="https://youtube.com/tuusuario">
        </div>

        <div class="col-md-6">
            <label for="other_red" class="form-label">Otra red / Portafolio</label>
            <input type="url" class="form-control" id="other_red" name="other_red" placeholder="https://miweb.com">
        </div>

        <div class="col-12 text-center mt-4">
            <button type="button" id="btn-continuar-step2" class="btn btn-primary rounded-pill px-5">Continuar</button>
        </div>
        </form>
    </div>
  </div>
</div>

<script>
  // Vista previa imagen
  document.getElementById('picture_profile').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = ev => document.getElementById('preview-image').src = ev.target.result;
      reader.readAsDataURL(file);
    }
  });
  // Mostrar Paso 2 después de guardar el Paso 1 correctamente
    document.addEventListener('DOMContentLoaded', function() {
    const alertSuccess = document.querySelector('.alert-success');
    if (alertSuccess && alertSuccess.textContent.includes('Paso 1 completado')) {
        document.getElementById('step1-form').style.display = 'none';
        document.getElementById('step2').style.display = 'block';
    }
    });

    // Mostrar input de portafolio correcto según tipo
    document.addEventListener('change', function(e) {
    if (e.target.id === 'type_briefcase') {
        const type = e.target.value;
        const file = document.getElementById('projects_file');
        const url = document.getElementById('projects_url');

        if (type === 'PDF' || type === 'VIDEO') {
        file.classList.remove('d-none');
        url.classList.add('d-none');
        } else if (type === 'URL') {
        file.classList.add('d-none');
        url.classList.remove('d-none');
        } else {
        file.classList.add('d-none');
        url.classList.add('d-none');
        }
    }
    });

</script>

@endsection
