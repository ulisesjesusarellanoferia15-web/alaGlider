@extends('partials.master')
@php use Illuminate\Support\Str; @endphp
@section('content')

<div class="container mt-5">
  <div class="card shadow-lg border-0 rounded-4 p-4 mx-auto" style="max-width: 900px;">
    <h4 class="text-center fw-bold mb-4">Editar perfil</h4>
    
    @if (session('success'))
      <div class="alert alert-success text-center rounded-pill py-2">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
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
            <input type="email" class="form-control" id="email" 
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

          <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-success rounded-pill px-5">Guardar cambios</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  document.getElementById('picture_profile').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('preview-image').src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });
</script>

@endsection


