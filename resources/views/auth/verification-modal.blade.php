<!-- Modal de Verificación -->
<div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="verificationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="verificationModalLabel">Verificación de Correo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="verifyForm">
          @csrf
          <input type="hidden" id="verifyEmail" name="email">
          <div class="mb-3">
            <label for="verification_code" class="form-label">Código de Verificación</label>
            <input type="text" class="form-control" id="verification_code" name="verification_code" placeholder="Ingresa el código enviado a tu correo" required>
          </div>
          <button type="submit" class="btn btn-success w-100">Verificar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('verifyForm').addEventListener('submit', function (e) {
    e.preventDefault();

    let form = this;
    let formData = new FormData(form);

    // Asegurarse que el input oculto email tiene el valor
    formData.set('email', document.getElementById('verifyEmail').value);

    fetch("{{ route('verify.user') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.success) {
            var verifyModal = bootstrap.Modal.getInstance(document.getElementById('verificationModal'));
            verifyModal.hide();
            window.location.href = "{{ route('index') }}";
        }
    })
    .catch(error => {
        console.error(error);
        alert("Error en la petición AJAX");
    });
});

</script>
