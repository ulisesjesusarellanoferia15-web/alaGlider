<!-- Modal de Registro -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg overflow-hidden">
      <div class="row g-0">

        <!-- Sección Izquierda (Imagen) -->
        <div class="col-md-5 d-none d-md-block position-relative">
          <img src="{{ asset('assets/img/img_register.png') }}" alt="Imagen alusiva a Alaglider" 
               class="w-100 h-100 object-fit-cover">
          <div class="position-absolute top-0 start-0 w-100 h-100" 
               style="background: rgba(0,0,0,0.45);"></div>
        </div>

        <!-- Sección Derecha (Formulario) -->
        <div class="col-md-7 bg-white position-relative">
          
          <!-- Botón de cerrar (arriba a la derecha) -->
          <button type="button" 
                  class="btn-close position-absolute" 
                  data-bs-dismiss="modal" 
                  aria-label="Cerrar"
                  style="top: 40px; right: 40px; z-index: 10;">
          </button>

          <div class="p-4 pt-5">
            <!-- Encabezado -->
            <div class="text-start mb-3">
              <h2 class="fw-bold text-dark mb-1" style="font-size: 1.8rem;">Crea tu cuenta</h2>
              <p class="text-muted mb-4" style="font-size: 0.95rem;">Regístrate en Alaglider para acceder</p>
            </div>

            <!-- Formulario -->
            <form id="registerForm" novalidate>
              @csrf
              <div class="row g-3">

                <div class="col-md-6">
                  <label for="name" class="form-label">Nombre(s)</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nombre(s)" required>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="col-md-6">
                  <label for="lastname" class="form-label">Apellidos</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellidos" required>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="col-md-6">
                  <label for="username" class="form-label">Nombre de Usuario</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" required>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="col-md-3">
                  <label for="sex_id" class="form-label">Género</label>
                  <select class="form-control" id="sex_id" name="sex_id" required>
                    <option value="">Seleccione...</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Otro</option>
                  </select>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="col-md-3">
                  <label for="id_country" class="form-label">País</label>
                  <select class="form-control" id="id_country" name="id_country" required>
                    <option value="">Seleccione...</option>
                    <option value="7263ba2f-23c3-484c-a76c-d7ca66d8413c">México</option>
                    <option value="99628bad-7485-4267-afcf-82b4b98d5317">Colombia</option>
                  </select>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="col-md-6">
                  <label for="email" class="form-label">Correo Electrónico</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="correo@ejemplo.com" required>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="col-md-6">
                  <label for="phone" class="form-label">Teléfono</label>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="10 dígitos" required>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="col-md-6">
                  <label for="password" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                  <div class="invalid-feedback"></div>
                </div>

                <div class="col-md-6">
                  <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********" required>
                  <div class="invalid-feedback"></div>
                </div>
              </div>

              <!-- Checkbox de términos -->
              <div class="form-check mt-4">
                <input class="form-check-input" type="checkbox" value="" id="termsCheck" required>
                <div class="invalid-feedback"></div>
                <label class="form-check-label" for="termsCheck" style="font-size: 0.9rem;">
                  Acepto los 
                  <a href="javascript:void(0);" class="text-success fw-semibold" data-bs-toggle="modal" data-bs-target="#privacidadModal">
                    términos y condiciones
                  </a> 
                  de la plataforma
                </label>
              </div>

              <!-- Botón de registro -->
              <div class="mt-3">
                <button type="submit" class="btn btn-success w-100 rounded-pill py-2 fw-semibold" id="registerButton">
                  Crear cuenta
                </button>
              </div>

              <!-- Separador "O" -->
              <div class="d-flex align-items-center my-3">
                <hr class="flex-grow-1">
                <span class="mx-2 text-secondary fw-bold">O</span>
                <hr class="flex-grow-1">
              </div>

              <!-- Botones sociales -->
              <div class="d-grid gap-2 mb-3">
                <button type="button" class="btn btn-social rounded-pill py-2 fw-semibold"
                        style="background-color: #E0E0E0; color: #000;">
                  <img src="{{ asset('assets/img/google-icon.png') }}" alt="Google" style="width:20px; height:20px;" class="me-2">
                  Registrarse con Google
                </button>

                <button type="button" class="btn btn-social rounded-pill py-2 fw-semibold"
                        style="background-color: #1877F2; color: #fff;">
                  <img src="{{ asset('assets/img/facebook-icon.png') }}" alt="Facebook" style="width:20px; height:20px;" class="me-2">
                  Registrarse con Facebook
                </button>
              </div>

              <!-- Enlace a inicio de sesión -->
              <div class="mt-3 text-center">
                <p class="mb-0 text-secondary" style="font-size: 0.9rem;">
                  ¿Ya tienes cuenta?
                  <a href="javascript:void(0);" data-bs-dismiss="modal" data-bs-toggle="modal" 
                     data-bs-target="#loginModal" class="text-success fw-semibold">
                    Inicia sesión aquí
                  </a>
                </p>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<!-- Modal de Términos y Condiciones -->
<div class="modal fade" id="privacidadModal" tabindex="-1" aria-labelledby="privacidadLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="privacidadLabel">Política de Privacidad</h5>
                <button type="button" 
                  class="btn-close position-absolute" 
                  data-bs-dismiss="modal" 
                  aria-label="Cerrar"
                  style="top: 40px; right: 40px; z-index: 10;">
                </button>
            </div>
            <div class="modal-body">
                <p>La presente Política de Privacidad, establece los términos en que Ala Glider usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando te pedimos llenar los campos de información personal con la cual puedas ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo, esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que te recomendamos y enfatizamos revisar continuamente esta página para asegurarte que estás de acuerdo con dichos cambios. <br> <br>
                <h6>Información que es recogida </h6>
                Nuestro sitio web podrá recoger información personal por ejemplo: Nombre, información de contacto como tu dirección de correo electrónico e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación. <br> <br>
                <h6>Uso de la información recogida</h6>
                Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios. Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, nuevos productos y otra información publicitaria que consideremos relevante para ti o que pueda brindarte algún beneficio, estos correos electrónicos serán enviados a la dirección que nos proporciones y podrán ser cancelados en cualquier momento. <br>
                En Ala Glider estamos altamente comprometidos para cumplir con el compromiso de mantener tu información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado. <br><br>
                <h6>Cookies</h6>
                Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en tu ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al tráfico web, y también facilita las futuras visitas a una web recurrente. Otra función que tienen las cookies es que con ellas las web pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado. <br>
                Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta información es empleada únicamente para análisis estadístico y después la información se elimina de forma permanente. Puedes eliminar las cookies en cualquier momento desde tu ordenador o dispositivo. Sin embargo, las cookies ayudan a proporcionar un mejor servicio de los sitios web, éstas no dan acceso a información de tu ordenador ni tuyo, a menos que así lo quieras y proporciones directamente. Puedes aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies automáticamente pues sirve para tener un mejor servicio web. También puedes cambiar la configuración de tu ordenador o dispositivo para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios. <br> <br>
                <h6>Enlaces a Terceros</h6>
                Este sitio web pudiera contener enlaces a otros sitios que pudieran ser de tu interés. Una vez que das clic en estos enlaces y abandones nuestra página, ya no tenemos control sobre el sitio al que eres redirigido y por lo tanto no somos responsables de los términos o privacidad ni de la protección de tus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad, por lo cual es recomendable que los consultes para confirmar que estás de acuerdo con estas. <br> <br>
                <h6>Control de su información personal</h6>
                En cualquier momento puedes restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web. Cada vez que se te solicite rellenar un formulario, como el de alta de usuario, puedes marcar o desmarcar la opción de recibir información por correo electrónico. En caso de que hayas marcado la opción de recibir nuestro boletín o publicidad puedes cancelarla en cualquier momento. <br>
                Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin tu consentimiento, salvo que sea requerido por un juez con una orden judicial. Ala Glider se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.</p>
            </div>
            <div class="modal-footer border-0">
              <button type="button" id="btnAceptarPrivacidad" class="btn btn-success rounded-pill" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');

    const privacidadModal = document.getElementById("privacidadModal");
    const btnAceptar = document.getElementById("btnAceptarPrivacidad");

    // Inicializa los modales Bootstrap
    const modalPrivacidad = new bootstrap.Modal(privacidadModal);
    const modalRegistro = new bootstrap.Modal(document.getElementById("registerModal"));

    // Cuando se cierra el modal (por X o clic fuera)
    privacidadModal.addEventListener('hidden.bs.modal', function () {
      modalRegistro.show(); // Reabre el modal de registro
    });

    // Al hacer clic en "Aceptar"
    btnAceptar.addEventListener("click", function () {
      modalPrivacidad.hide(); // Cierra este modal
      setTimeout(() => {
        // Marca la casilla de términos como seleccionada
        const check = document.querySelector("#registerModal input[type='checkbox']");
        if (check) check.checked = true;
        modalRegistro.show(); // Reabre el modal de registro
      }, 500); // Espera medio segundo para evitar conflicto visual
    });

    // Mostrar mensaje de error
    function showError(input, message) {
        input.classList.add('is-invalid');
        input.nextElementSibling.textContent = message;
    }

    // Limpiar error
    function clearError(input) {
        input.classList.remove('is-invalid');
        input.nextElementSibling.textContent = '';
    }

    // Expresiones regulares
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\d{10}$/;
    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$_?]).{6,}$/;

    // Validación en tiempo real al escribir
    form.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('input', () => clearError(input));
    });

    // Validación al enviar
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        let valid = true;

        const name = document.getElementById('name');
        const lastname = document.getElementById('lastname');
        const username = document.getElementById('username');
        const sex_id = document.getElementById('sex_id');
        const country = document.getElementById('id_country');
        const email = document.getElementById('email');
        const phone = document.getElementById('phone');
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password_confirmation');
        const terms = document.getElementById('termsCheck');

        // Validaciones
        if (!name.value.trim()) { showError(name, 'El nombre es obligatorio'); valid = false; }
        if (!lastname.value.trim()) { showError(lastname, 'Los apellidos son obligatorios'); valid = false; }
        if (!username.value.trim()) { showError(username, 'El nombre de usuario es obligatorio'); valid = false; }
        if (!sex_id.value) { showError(sex_id, 'Selecciona un género'); valid = false; }
        if (!country.value) { showError(country, 'Selecciona un país'); valid = false; }
        if (!email.value.trim()) { showError(email, 'El correo es obligatorio'); valid = false; }
        else if (!emailRegex.test(email.value.trim())) { showError(email, 'Correo inválido'); valid = false; }
        if (!phone.value.trim()) { showError(phone, 'El teléfono es obligatorio'); valid = false; }
        else if (!phoneRegex.test(phone.value.trim())) { showError(phone, 'Debe tener 10 dígitos'); valid = false; }
        if (!password.value) { showError(password, 'La contraseña es obligatoria'); valid = false; }
        else if (!passwordRegex.test(password.value)) { 
            showError(password, 'Mínimo 6 caracteres, 1 número, 1 mayúscula y 1 carácter especial (@,$,_,?)'); 
            valid = false; 
        }
        if (!passwordConfirm.value) { showError(passwordConfirm, 'Confirma tu contraseña'); valid = false; }
        else if (password.value !== passwordConfirm.value) { showError(passwordConfirm, 'Las contraseñas no coinciden'); valid = false; }
        if (!terms.checked) { alert('Debes aceptar los términos y condiciones'); valid = false; }

        if (!valid) return;

        // Enviar formulario si todo es válido
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
            if (data.success) {
                alert(data.message);
                bootstrap.Modal.getInstance(document.getElementById('registerModal')).hide();
                document.getElementById('verifyEmail').value = email.value;
                new bootstrap.Modal(document.getElementById('verificationModal')).show();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error(error);
            alert("Error en la petición AJAX (registro)");
        });
    });
});
</script>


