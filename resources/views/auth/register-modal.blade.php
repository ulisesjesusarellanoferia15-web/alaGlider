<!-- Modal de Registro -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Crear Cuenta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formRegister" method="POST" action="{{ route('register') }}">
          @csrf
          <div class="row g-3">
            
            <!-- Nombre(s) -->
            <div class="col-md-6">
              <label for="name" class="form-label">Nombre(s)</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Ej. Ulises" required>
            </div>

            <!-- Apellidos -->
            <div class="col-md-6">
              <label for="lastname" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Ej. Arellano Feria" required>
            </div>

            <!-- Nombre de usuario -->
            <div class="col-md-6">
              <label for="username" class="form-label">Nombre de Usuario</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
            </div>

            <!-- Género y País en la misma fila -->
            <div class="col-md-3">
              <label for="gender" class="form-label">Género</label>
              <select class="form-select" id="gender" name="gender" required>
                <option value="">Seleccione...</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
              </select>
            </div>

            <div class="col-md-3">
              <label for="country" class="form-label">País</label>
              <select class="form-select" id="country" name="country" required>
                <option value="">Seleccione...</option>
                <option value="México">México</option>
                <option value="Colombia">Colombia</option>
              </select>
            </div>

            <!-- Email -->
            <div class="col-md-6">
              <label for="email" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="correo@ejemplo.com" required>
            </div>

            <!-- Teléfono -->
            <div class="col-md-6">
              <label for="phone" class="form-label">Teléfono</label>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="10 dígitos" required>
            </div>

            <!-- Contraseña -->
            <div class="col-md-6">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
            </div>

            <!-- Confirmación de Contraseña -->
            <div class="col-md-6">
              <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********" required>
            </div>
          </div>

          <!-- Botón de registro -->
          <div class="mt-4">
            <button type="submit" class="btn btn-primary w-100">Registrarse</button>
          </div>

          <!-- Enlace para iniciar sesión -->
          <div class="mt-3 text-center">
            <p class="mb-0">
              ¿Ya tienes cuenta?
              <a href="javascript:void(0);" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal">
                Inicia sesión aquí
              </a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
