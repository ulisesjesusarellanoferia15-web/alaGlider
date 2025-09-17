<!-- Modal de Inicio de Sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formLogin" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <label for="email_login" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email_login" name="email" placeholder="correo@ejemplo.com" required>
          </div>
          <div class="mb-3">
            <label for="password_login" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password_login" name="password" placeholder="********" required>
          </div>

          <!-- Olvidé mi contraseña -->
          <div class="mb-3 text-end">
            <a href="#">¿Olvidaste tu contraseña?</a>
          </div>

          <!-- Botón de iniciar sesión -->
          <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
          </div>

          <!-- Enlace para crear cuenta -->
          <div class="text-center">
            <p class="mb-0">
              ¿No tienes cuenta?
              <a href="javascript:void(0);" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">
                Crea tu cuenta aquí
              </a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
