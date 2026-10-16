<!-- Footer sólido de pantalla completa inspirado exactamente en image_65d30d.png -->
<footer class="w-100 py-5 mt-5 text-white-50 style-solid-footer" style="background-color: #0c5c05 !important;">
    <div class="container py-4">
        <div class="row g-4">
            
            <!-- Columna 1: Logo y Descripción Corta -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-shield-check me-2 text-white" style="font-size: 1.6rem;"></i>
                    <h5 class="fw-bold m-0 text-white">Admin<span style="color: #38a9009a;">SENA</span></h5>
                </div>
                <p class="small lh-base mb-0" style="max-width: 320px;">
                    Plataforma desarrollada para la administración, asignación y seguimiento de equipos de cómputo, ambientes formativos y fichas académicas de AdminSENA.
                </p>
            </div>

            <!-- Columna 2: Navegación -->
            <div class="col-lg-2 col-md-6 ms-lg-auto">
                <h6 class="fw-bold text-white mb-3" style="font-size: 0.9rem; letter-spacing: 0.5px; text-transform: uppercase;">Navegación</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    <li><a href="{{ route('welcome') }}" class="text-reset text-decoration-none hover-footer-link">Inicio</a></li>
                    <li><a href="{{ route('training_center.create') }}" class="text-reset text-decoration-none hover-footer-link">Centros de Formación</a></li>
                    <li><a href="{{ route('area.create') }}" class="text-reset text-decoration-none hover-footer-link">Áreas</a></li>
                </ul>
            </div>

            <!-- Columna 3: Enlaces Rápidos -->
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold text-white mb-3" style="font-size: 0.9rem; letter-spacing: 0.5px; text-transform: uppercase;">Enlaces Útiles</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    <li><a href="{{ route('teacher.create') }}" class="text-reset text-decoration-none hover-footer-link">Instructores</a></li>
                    <li><a href="{{ route('course.create') }}" class="text-reset text-decoration-none hover-footer-link">Cursos / Fichas</a></li>
                    <li><a href="{{ route('apprentice.create') }}" class="text-reset text-decoration-none hover-footer-link">Aprendices</a></li>
                </ul>
            </div>

            <!-- Columna 4: Soporte y Estado -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-white mb-3" style="font-size: 0.9rem; letter-spacing: 0.5px; text-transform: uppercase;">Soporte</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    <li>
                        <a href="mailto:soporte.adminsena@misena.edu.co" class="text-reset text-decoration-none hover-footer-link d-flex align-items-center gap-2">
                            <i class="bi bi-tools text-white"></i> Soporte Técnico
                        </a>
                    </li>
                    <li class="text-white-50 small mt-1">
                        <i class="bi bi-check-circle-fill text-success me-1"></i> AdminSENA © 2026 - Verificado
                    </li>
                </ul>
            </div>

        </div>

        <!-- Línea divisoria horizontal sutil idéntica a la imagen -->
        <hr class="my-4 border-white opacity-25">

        <!-- Barra de contactos inferior basada en image_65d30d.png -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 small">
            
            <!-- Datos inline organizados -->
            <div class="d-flex flex-wrap gap-4 text-center text-md-start justify-content-center">
                <span><i class="bi bi-building me-2"></i> Centro de Formación</span>
                <span><i class="bi bi-envelope me-2"></i> soporte.adminsena@misena.edu.co</span>
            </div>
            
            <!-- Redes sociales o links institucionales en el extremo derecho -->
            <div class="d-flex gap-3 fs-5">
                <a href="https://www.facebook.com/SENAColombia" class="text-reset hover-footer-link" target="_blank" rel="noopener noreferrer" aria-label="Facebook del SENA"><i class="bi bi-facebook"></i></a>
                <a href="https://x.com/SENAComunica" class="text-reset hover-footer-link" target="_blank" rel="noopener noreferrer" aria-label="X del SENA"><i class="bi bi-twitter-x"></i></a>
                <a href="https://www.youtube.com/user/SENATV" class="text-reset hover-footer-link" target="_blank" rel="noopener noreferrer" aria-label="YouTube del SENA"><i class="bi bi-youtube"></i></a>
            </div>
        </div>

        <!-- Copy final centrado abajo del todo -->
        <div class="text-center mt-4 pt-2 opacity-50" style="font-size: 0.8rem;">
            &copy; 2026 AdminSENA - Todos los derechos reservados.
        </div>
    </div>
</footer>

<!-- CSS complementario para forzar la ruptura del contenedor si hiciera falta -->
<style>
    .style-solid-footer {
        width: 100vw !important;
        position: relative !important;
        left: 50% !important;
        right: 50% !important;
        margin-left: -50vw !important;
        margin-right: -50vw !important;
    }
    
    .hover-footer-link {
        transition: color 0.2s ease-in-out;
    }
    .hover-footer-link:hover {
        color: #39A900 !important; /* Resalta en verde SENA al pasar el mouse */
    }
</style>