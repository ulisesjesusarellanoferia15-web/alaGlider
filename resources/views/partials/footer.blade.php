<footer class="site-footer text-light position-relative"
        style="border-radius: 80px 80px 0 0; padding-top: 180px;">


    <!-- Bloque Azul (Newsletter) -->
    <div class="position-absolute start-50"
        style="top: -120px; transform: translateX(-50%); width: 100%; max-width: 750px;">
        <div class="p-5 text-center shadow-lg"
            style="background: linear-gradient(135deg,#3b82f6,#06b6d4); border-radius: 20px;">

            <h3 class="text-white fw-bold">Mantente al tanto de <br> nuestras actualizaciones</h3>


            <!-- Formulario -->
            <form class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-2">
                <input type="email" class="form-control rounded-pill px-3 py-2 w-100 w-md-50" placeholder="Email">
                <button class="btn btn-outline-light rounded-pill px-4">¡Inscribirme!</button>
            </form>

            <small class="d-block mt-3 text-white">
                <input type="checkbox" class="form-check-input me-2">
                * Al ingresar tu email, aceptas recibir el boletín de Alaglider. Puedes darte de baja
                en cualquier momento. Ve a nuestra
                <a href="javascript:void(0)" class="text-white text-decoration-underline" data-bs-toggle="modal" data-bs-target="#privacidadModal">Política de privacidad</a>.
            </small>
        </div>
    </div>

    <!-- Contenido del Footer Negro -->
    <div class="container pt-5">
        <div class="row gy-4">

            <!-- Columna 1: Logo + Botones -->
            <div class="col-md-3 text-center text-md-start">
                <img src="{{ asset('assets/img/logo.png') }}" alt="AlaGlider Logo" width="180" class="mb-3">

                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-outline-light rounded-pill d-flex justify-content-between align-items-center">
                        Ir a los vuelos destacados <span>➜</span>
                    </a>
                    <a href="#" class="btn btn-outline-light rounded-pill d-flex justify-content-between align-items-center">
                        Conviértete en un Glider <span>➜</span>
                    </a>
                </div>
            </div>
            <!-- Columna 2: Categorías -->
            <div class="col-md-2">
                <h6 class="fw-bold text-white"> Categorías</h6>
                <ul class="list-unstyled">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('categories.show', $category->slug) }}"
                            class="footer-link text-white text-decoration-none">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- Columna 3: Acerca de -->
            <div class="col-md-2">
                <h6 class="fw-bold text-white"> Acerca</h6>
                <ul class="list-unstyled">
                    <li>
                        <a href="javascript:void(0)"
                            class="footer-link text-white text-decoration-none"
                            data-bs-toggle="modal" data-bs-target="#comunidadModal">
                            Comunidad
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"
                            class="footer-link text-white text-decoration-none"
                            data-bs-toggle="modal" data-bs-target="#sobreNosotrosModal">
                            Sobre nosotros
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"
                            class="footer-link text-white text-decoration-none"
                            data-bs-toggle="modal" data-bs-target="#pagosModal">
                            Métodos de pago
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"
                            class="footer-link text-white text-decoration-none"
                            data-bs-toggle="modal" data-bs-target="#privacidadModal">
                            Política de privacidad
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Columna 4: Soporte -->
            <div class="col-md-2">
                <h6 class="fw-bold text-white"> Soporte</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link text-white text-decoration-none">Ayuda y Soporte</a></li>
                    <li><a href="#" class="footer-link text-white text-decoration-none">Comprar en Alaglilder</a></li>
                    <li><a href="#" class="footer-link text-white text-decoration-none">Vender en Alaglilder</a></li>
                </ul>
            </div>

            <!-- Columna 5: Redes Sociales -->
            <div class="col-md-3">
                <h6 class="fw-bold text-white"> Redes Sociales</h6>
                <ul class="list-unstyled">
                    <li><a href="https://facebook.com/AlaGlider#" target="_blank" class="footer-link text-white text-decoration-none">Facebook</a></li>
                    <li><a href="https://instagram.com/alaglider/" target="_blank" class="footer-link text-white text-decoration-none">Instagram</a></li>
                    <li><a href="https://youtube.com/channel/UCcagZbHcl_InjuwAYMedhPQ" target="_blank" class="footer-link text-white text-decoration-none">YouTube</a></li>
                    <li><a href="https://x.com/ala_glider" target="_blank" class="footer-link text-white text-decoration-none">Twitter</a></li>
                </ul>
            </div>

        </div>

        <!-- Línea inferior -->
        <hr class="border-secondary mt-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <p class="mb-0 small">Copyright © Alaglilder 2025.|
            </p>

            <!-- Logos de Pago -->
            <div class="d-flex gap-3 mt-3 mt-md-0">
                <img src="{{ asset('assets/img/icons/payments/stripe-logo.png') }}" alt="Stripe" height="30">
                <img src="{{ asset('assets/img/icons/payments/paypal_logo.png') }}" alt="PayPal" height="30">
                <img src="{{ asset('assets/img/icons/payments/mercado.png') }}" alt="Mercado Pago" height="30">
            </div>
        </div>
    </div>
</footer>

<!-- Modal Comunidad -->
<div class="modal fade" id="comunidadModal" tabindex="-1" aria-labelledby="comunidadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comunidadModalLabel">Nuestra Comunidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('assets/img/front-pages/comunidad.jpg') }}" class="img-fluid mb-3 rounded" alt="Comunidad">
                <p>En AlaGlider creemos en la fuerza de la comunidad creativa. Aquí puedes conectar, colaborar y crecer.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sobre Nosotros -->
<div class="modal fade" id="sobreNosotrosModal" tabindex="-1" aria-labelledby="sobreNosotrosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sobreNosotrosLabel">Sobre Nosotros</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('assets/img/front-pages/about.jpg') }}" class="img-fluid mb-3 rounded" alt="Nosotros">
                <p>Somos una plataforma que impulsa a freelancers y creativos para que lleven sus proyectos al siguiente nivel.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Métodos de Pago -->
<div class="modal fade" id="pagosModal" tabindex="-1" aria-labelledby="pagosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pagosLabel">Métodos de Pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('assets\img\icons\payments\Paypal_pagos.png') }}" class="img-fluid mb-3 rounded" alt="Pagos">
                <img src="{{ asset('assets\img\icons\payments\Mercado_pagos.png') }}" class="img-fluid mb-3 rounded" alt="Pagos">
                <img src="{{ asset('assets\img\icons\payments\Stripe_pagos.png') }}" class="img-fluid mb-3 rounded" alt="Pagos">
                <p>Aceptamos PayPal, Stripe y MercadoPago para tu comodidad y seguridad.</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Política de Privacidad -->
<div class="modal fade" id="privacidadModal" tabindex="-1" aria-labelledby="privacidadLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="privacidadLabel">Política de Privacidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
        </div>
    </div>
</div>
