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
            <button type="submit" id="btn-continuar" class="btn btn-success rounded-pill px-5">Continuar</button>
          </div>
        </div>
      </div>
    </form>

    {{-- Paso 2 (oculto inicialmente) --}}
    <div id="step2" class="mt-4" style="display:none;">
      <form id="step2-form" action="{{ route('registroGlider2.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
          @csrf

          <h5 class="fw-bold text-center mb-3">Información profesional</h5>

          <!-- Experiencia desde -->
          <div class="col-md-6">
              <label for="since_experience" class="form-label">Experiencia desde*</label>
              <input type="number" min="1950" max="{{ date('Y') }}" class="form-control" id="since_experience" name="since_experience" placeholder="Ej. 2019" required>
          </div>

          <!-- CV -->
          <div class="col-md-6">
              <label for="cv" class="form-label">Currículum (PDF)*</label>
              <input type="file" class="form-control" id="cv" name="url_vc" accept="application/pdf" required>
          </div>

          <!-- Tipo de portafolio -->
          <div class="col-md-6">
              <label for="type_briefcase" class="form-label">Tipo de portafolio*</label>
              <select class="form-control" id="type_briefcase" name="type_briefcase" required>
                  <option value="">Seleccione una opción</option>
                  <option value="PDF">PDF</option>
                  <option value="URL">URL</option>
                  <option value="VIDEO">Video</option>
              </select>
          </div>

          <!-- Portafolio -->
          <div class="col-md-6">
              <label for="projects" class="form-label">Archivo o enlace del portafolio*</label>
              <input type="file" class="form-control d-none" id="projects_file" name="projects" accept="application/pdf,video/*">
              <input type="url" class="form-control d-none" id="projects_url" name="projects" placeholder="https://...">
          </div>

          <!-- Nivel de estudios -->
          <div class="col-md-6">
              <label for="level_education" class="form-label">Nivel de estudios*</label>
              <select class="form-control" id="level_education" name="level_education" required>
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
                  <input class="form-check-input skill-checkbox" type="checkbox" id="is_titled" name="is_titled" value="1">
                  <label class="form-check-label" for="is_titled">Estoy titulado</label>
              </div>
          </div>

          <!-- Contenedor oculto -->
          <div id="titulo-fields" class="row" style="display: none;">
            <!-- Título -->
            <div class="col-md-6">
                <label for="title" class="form-label">Título / Profesión (PDF)</label>
                <input type="file" class="form-control" id="title" name="url_title" accept="application/pdf">
            </div>

            <!-- Cédula -->
            <div class="col-md-6">
                <label for="professional_license" class="form-label">Cédula profesional (PDF)</label>
                <input type="file" class="form-control" id="professional_license" name="url_professional_license" accept="application/pdf">
            </div>
          </div>

          <!-- Skills -->
          <div class="col-md-12">
              <label class="form-label">Selecciona tus habilidades*</label>
              <div class="row">
                  @foreach(\App\Models\Skill::all() as $skill)
                      <div class="col-md-4">
                          <div class="form-check">
                              <input class="form-check-input skill-checkbox" type="checkbox" id="skill_{{ $skill->id }}" name="skills[]" value="{{ $skill->id }}">
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
              <button type="submit" id="btn-continuar-step2" class="btn btn-success rounded-pill px-5">Continuar</button>
          </div>
      </form>
    </div>

    {{-- Paso 3 --}}
    <div id="step3" style="display:none;">

      <h4 class="mb-3">3. Datos de facturación</h4>

      <!-- Tipo de usuario -->
      <div class="mb-3">
          <label class="form-label">¿Eres Freelancer (Glider) o manejas Negocio o Empresa?</label>
          <select class="form-control" id="type_user" name="type_user_suscribe">
              <option value="" selected disabled>Selecciona</option>
              <option value="FREELANCER">Freelancer</option>
              <option value="ORGANIZATION">Negocio o empresa</option>
          </select>
      </div>

      <!-- Freelancer - Alta SAT -->
      <div id="sat-question" class="mb-3" style="display:none;">
          <label class="form-label">¿Estás dado de alta en el SAT?</label>
          <select class="form-control" id="register_sat" name="register_sat">
              <option value="" selected disabled>Selecciona</option>
              <option value="0">No</option>
              <option value="2">Sí</option>
          </select>
      </div>

      <!-- FORMULARIO DE FACTURACIÓN -->
      <form method="POST" action="{{ route('glider.store.step3') }}" id="billing-form" style="display:none;" enctype="multipart/form-data">
        @csrf

        <!-- HIDDEN NECESARIOS PARA VALIDAR -->
        <input type="hidden" name="type_user_suscribe" id="billing_type_user">
        <input type="hidden" name="register_sat" id="billing_register_sat" value="2">

        <div class="row">
            <!-- Tipo de persona -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Tipo de persona*</label>
                <select class="form-control" name="type_person" required>
                    <option value="FISICA">Natural</option>
                    <option value="MORAL">Juridica</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre de negocio</label>
                <input type="text" class="form-control" name="business_name">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre comercial*</label>
                <input type="text" class="form-control" name="tradename" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">RFC/NIT*</label>
                <input type="text" class="form-control" name="rfc" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Acta constitutiva/Cámara de comercio</label>
                <input type="file" class="form-control" name="url_acta_constitutiva" accept="application/pdf">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">RFC (PDF)</label>
                <input type="file" class="form-control" name="url_rfc" accept="application/pdf">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Calle/Dirección*</label>
                <input type="text" class="form-control" name="street" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Número Exterior*</label>
                <input type="number" class="form-control" name="outdoor_number" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Número Interior*</label>
                <input type="text" class="form-control" name="inner_number" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Colonia/Barrio*</label>
                <input type="text" class="form-control" name="suburb" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Código Postal*</label>
                <input type="number" class="form-control" name="pc" required>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label">Observaciones</label>
                <textarea class="form-control" name="observations"></textarea>
            </div>

        </div>
        
        <button type="submit" class="btn btn-success">Continuar</button>
      </form>

      <!-- Botón continuar para casos sin formulario -->
      <form method="POST" action="{{ route('glider.store.step3') }}">
          @csrf
          <input type="hidden" name="type_user_suscribe" id="hidden_type_user">
          <input type="hidden" name="register_sat" id="hidden_register_sat">
          <button type="submit" class="btn btn-success" id="btn-step3-continue" style="display:none;">Continuar</button>
      </form>
    </div>

    {{-- Paso 4 --}}
    <div id="step4" style="display:none;">

      <h4 class="mb-3">4. Datos Bancarios</h4>

      <form method="POST" action="{{ route('glider.store.step4') }}" enctype="multipart/form-data" class="row g-3">
        @csrf

        <!-- Número de cuenta -->
        <div class="col-md-6">
            <label class="form-label">Número de cuenta*</label>
            <input 
                type="text"
                name="account_number"
                class="form-control"
                placeholder="0010001000100010"
                required>
        </div>

        <!-- Banco -->
        <div class="col-md-6">
          <label class="form-label">Banco*</label>
          <select name="bank_id" class="form-control" required>
              <option value="">Selecciona banco</option>
              @foreach(\App\Models\Bank::all() as $bank)
                  <option value="{{ $bank->id }}">{{ $bank->name }}</option>
              @endforeach
          </select>
        </div>

        <!-- Clabe interbancaria -->
        <div class="col-md-6">
            <label class="form-label">Clabe interbancaria / Tipo de cuenta*</label>
            <input 
                type="text"
                name="clabe"
                class="form-control"
                placeholder="18 dígitos"
                required>
            <small class="text-muted">Los 18 dígitos</small>
        </div>

        <!-- Certificación bancaria -->
        <div class="col-md-6">
            <label class="form-label">Certificación bancaria*</label>
            <input 
                type="file"
                name="bank_certification"
                class="form-control"
                accept="application/pdf"
                required>
            <small class="text-muted">
                No mayor a 3 meses con clave interbancaria, RFC y domicilio visible.
            </small>
        </div>

        <!-- Aceptar términos -->
        <div class="col-md-12 mt-2">
            <div class="form-check">
                <input 
                    type="checkbox"
                    class="form-check-input skill-checkbox"
                    id="terms_conditions"
                    name="terms_conditions"
                    value="1"
                    required>
                <label for="terms_conditions" class="form-check-label text-primary" style="cursor:pointer;">
                    Acepto términos y condiciones
                </label>
            </div>
        </div>

        <!-- Botón continuar -->
        <div class="col-12 text-end mt-3">
            <button type="submit" class="btn btn-success rounded-pill px-4">
                Continuar
            </button>
        </div>

      </form>
    </div>

  </div>
</div>

<script>
  // Vista previa de imagen (del paso 1)
  document.getElementById('picture_profile').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = ev => document.getElementById('preview-image').src = ev.target.result;
      reader.readAsDataURL(file);
    }
  });

  document.addEventListener('DOMContentLoaded', function() {
    // Mostrar el formulario del paso 2 si ya se completó el paso 1
    const alertSuccess = document.querySelector('.alert-success');
    if (alertSuccess && alertSuccess.textContent.includes('Paso 1 completado')) {
      document.getElementById('step1-form').style.display = 'none';
      document.getElementById('step2').style.display = 'block';
    }

    // Mostrar paso 3 si el paso 2 ya se completó
    if (alertSuccess && alertSuccess.textContent.includes('Paso 2 completado')) {
      document.getElementById('step1-form').style.display = 'none';
      document.getElementById('step2').style.display = 'none';
      document.getElementById('step3').style.display = 'block';
    }

    if (alertSuccess && alertSuccess.textContent.includes('Paso 3 completado')) {
      document.getElementById('step1-form').style.display = 'none';
      document.getElementById('step2').style.display = 'none';
      document.getElementById('step3').style.display = 'none';
      document.getElementById('step4').style.display = 'block';
    }


    // ---- Logica del paso 2 -----
    // Mostrar input correcto según tipo de portafolio
    const typeSelect = document.getElementById('type_briefcase');
    const fileInput = document.getElementById('projects_file');
    const urlInput = document.getElementById('projects_url');

    typeSelect.addEventListener('change', () => {
      const type = typeSelect.value;
      fileInput.classList.add('d-none');
      urlInput.classList.add('d-none');
      fileInput.required = false;
      urlInput.required = false;

      if (type === 'PDF' || type === 'VIDEO') {
        fileInput.classList.remove('d-none');
        fileInput.required = true;
      } else if (type === 'URL') {
        urlInput.classList.remove('d-none');
        urlInput.required = true;
      }
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
    const checkbox = document.getElementById("is_titled");
    const tituloFields = document.getElementById("titulo-fields");

    // Mostrar u ocultar al cambiar el checkbox
    checkbox.addEventListener("change", function () {
      if (this.checked) {
        tituloFields.style.display = "flex";
      } else {
        tituloFields.style.display = "none";
        // Limpiar los campos cuando se ocultan
        document.getElementById("title").value = "";
        document.getElementById("professional_license").value = "";
      }
    });

    // Si la página se recarga y el checkbox estaba marcado
    if (checkbox.checked) {
      tituloFields.style.display = "flex";
    }
  });

  // ----- Lógica de paso 3 -----
  document.addEventListener("DOMContentLoaded", function () {

    const typeUser = document.getElementById("type_user");
    const satQuestion = document.getElementById("sat-question");
    const registerSat = document.getElementById("register_sat");
    const billingForm = document.getElementById("billing-form");
    const btnContinue = document.getElementById("btn-step3-continue");

    const hiddenTypeUser = document.getElementById("hidden_type_user");
    const hiddenRegisterSat = document.getElementById("hidden_register_sat");

    // Cambio entre Freelancer / Empresa
    typeUser.addEventListener("change", function () {

        const value = this.value;
        hiddenTypeUser.value = value;

        if (value === "FREELANCER") {
            satQuestion.style.display = "block";
            billingForm.style.display = "none";
            btnContinue.style.display = "none";
        }

        if (value === "ORGANIZATION") {
            satQuestion.style.display = "none";
            billingForm.style.display = "block";
            btnContinue.style.display = "none";
        }
    });

    // Cambio en pregunta del SAT
    registerSat.addEventListener("change", function () {

        const value = this.value;
        hiddenRegisterSat.value = value;

        if (value === "0") {
            billingForm.style.display = "none";
            btnContinue.style.display = "block";
        }

        if (value === "2") {
            billingForm.style.display = "block";
            btnContinue.style.display = "none";
        }
    });

  });

  document.getElementById('type_user').addEventListener('change', function() {
    document.getElementById('hidden_type_user').value = this.value;
    document.getElementById('billing_type_user').value = this.value;
  });

  document.getElementById('register_sat').addEventListener('change', function() {

    const value = this.value;

    document.getElementById('hidden_register_sat').value = value;
    document.getElementById('billing_register_sat').value = value;
    
    
  });

</script>

@endsection