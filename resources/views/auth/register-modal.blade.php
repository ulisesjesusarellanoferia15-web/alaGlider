<!-- Modal de Registro -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Crear Cuenta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="registerForm">
          @csrf
          <div class="row g-3">
            
            <!-- Nombre(s) -->
            <div class="col-md-6">
              <label for="name" class="form-label">Nombre(s)</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nombre(s)" required>
            </div>

            <!-- Apellidos -->
            <div class="col-md-6">
              <label for="lastname" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" required>
            </div>

            <!-- Nombre de usuario -->
            <div class="col-md-6">
              <label for="username" class="form-label">Nombre de Usuario</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
            </div>

            <!-- Género y País -->
            <div class="col-md-3">
              <label for="sex_id" class="form-label">Género</label>
              <select class="form-select" id="sex_id" name="sex_id" required>
                <option value="">Seleccione...</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">Otro</option>
              </select>
            </div>

            <div class="col-md-3">
              <label for="id_country" class="form-label">País</label>
              <select class="form-select" id="id_country" name="id_country" required>
                <option value="">Seleccione...</option>
                <option value="7263ba2f-23c3-484c-a76c-d7ca66d8413c">México</option>
                <option value="99628bad-7485-4267-afcf-82b4b98d5317">Colombia</option>
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
            <button type="submit" class="btn btn-primary w-100" id="registerButton">Registrarse</button>
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

<script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let form = this;
    let formData = new FormData(form);

    fetch("{{ route('register') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if (data.success) {
            alert(data.message);

            // Cerrar modal de registro
            let registerModal = bootstrap.Modal.getInstance(document.getElementById('registerModal'));
            registerModal.hide();

            // Establecer el email en el modal de verificación
            document.getElementById('verifyEmail').value = document.getElementById('email').value;

            // Abrir el modal de verificación automáticamente
            let verifyModal = new bootstrap.Modal(document.getElementById('verificationModal'));
            verifyModal.show();
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error(error);
        alert("Error en la petición AJAX (registro)");
    });
});
</script>

