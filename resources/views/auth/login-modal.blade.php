<!-- Modal de Inicio de Sesión -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg overflow-hidden">
      <div class="row g-0">

        <!-- Sección Izquierda (Imagen) -->
        <div class="col-md-6 d-none d-md-block position-relative">
          <img src="{{ asset('assets/img/img-login.png') }}" class="img-fluid h-100 w-100 object-fit-cover" alt="Imagen de inicio">
          <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0, 0, 0, 0.5);"></div>
        </div>

        <!-- Sección Derecha (Formulario) -->
        <div class="col-md-6 bg-white p-5 position-relative">

          <!-- Botón de cerrar -->
          <button type="button" 
                  class="btn-close position-absolute" 
                  data-bs-dismiss="modal" 
                  aria-label="Cerrar"
                  style="top: 30px; right: 30px; z-index: 10;">
          </button>

          <div class="text-center mb-4">
            <h3 class="fw-bold mb-1">Hey, hola 👋</h3>
            <p class="text-muted mb-0">Entra a <span class="text-success fw-semibold">Alaglider</span> con los datos que ingresaste.</p>
          </div>

          <form id="formLogin" method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            <!-- Email -->
            <div class="mb-3">
              <label for="email_login" class="form-label">Email</label>
              <input type="email" 
                     class="form-control rounded-pill py-2 @error('email') is-invalid @enderror" 
                     id="email_login" 
                     name="email" 
                     placeholder="correo@ejemplo.com" 
                     value="{{ old('email') }}" 
                     required>
              @error('email')
                  <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
              @enderror
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
              <label for="password_login" class="form-label">Contraseña</label>
              <input type="password" 
                     class="form-control rounded-pill py-2 @error('password') is-invalid @enderror" 
                     id="password_login" 
                     name="password" 
                     placeholder="********" 
                     required>
              @error('password')
                  <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
              @enderror
            </div>

            <!-- Recordarme y Olvidar contraseña -->
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                <label class="form-check-label" for="remember_me">Recuérdame</label>
              </div>
              <a href="#" class="text-success text-decoration-none">¿Olvidaste tu contraseña?</a>
            </div>

            <!-- Botón principal -->
            <button type="submit" class="btn btn-success w-100 py-2 rounded-pill text-white">
              Iniciar Sesión
            </button>

            <!-- Separador -->
            <div class="my-4 text-center text-muted position-relative">
              <hr class="my-3">
              <span class="position-absolute top-50 start-50 translate-middle bg-white px-2">o</span>
            </div>

            <!-- Botones Sociales -->
            <div class="d-grid gap-2">
              <button type="button" class="btn border rounded-pill py-2 w-100 d-flex align-items-center justify-content-center btn-google">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google" width="20" class="me-2">
                Inicia con Google
              </button>
              <button type="button" class="btn text-white rounded-pill py-2 w-100 d-flex align-items-center justify-content-center btn-facebook" style="background-color: #1877f2;">
                <img src="{{ asset('assets/img/facebook-icon.png') }}" alt="Facebook" style="width:20px; height:20px;" class="me-2">
                Inicia con Facebook
              </button>
            </div>

            <!-- Crear cuenta -->
            <div class="text-center mt-4">
              <p class="mb-0 text-muted">
                ¿No tienes cuenta?
                <a href="javascript:void(0);" class="text-success fw-semibold" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registerModal">
                  Regístrate aquí
                </a>
              </p>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Validación en tiempo real -->

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const formLogin = document.getElementById('formLogin');

    formLogin.addEventListener('submit', async (e) => {
      e.preventDefault();

      // Limpiar errores anteriores
      formLogin.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
      formLogin.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

      const formData = new FormData(formLogin);

      try {
        const response = await fetch(formLogin.action, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json',
          },
          body: formData,
        });

        let data;
        try {
          data = await response.json();
        } catch (err) {
          console.error('Respuesta no JSON:', await response.text());
          return;
        }

        if (response.status === 422 && data.errors) {
          Object.entries(data.errors).forEach(([field, messages]) => {
            const input = formLogin.querySelector(`[name="${field}"]`);
            if (input) {
              input.classList.add('is-invalid');
              const feedback = document.createElement('div');
              feedback.className = 'invalid-feedback d-block mt-1';
              feedback.textContent = messages[0];
              input.insertAdjacentElement('afterend', feedback);
            }
          });
          return;
        }

        if (data.success) {
          window.location.href = data.redirect;
        }

      } catch (error) {
        console.error('Error al enviar login:', error);
      }
    });
  });
</script>

