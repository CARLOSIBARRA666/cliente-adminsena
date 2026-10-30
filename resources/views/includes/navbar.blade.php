<!-- Navbar SENA Institucional -->

<!--BOTONES-->
<style>
    .btn-sena-accent {
        background-color: #39A900;
        border: none;
        color: #fff;
        border-radius: 15px;
        font-weight: 600;
        transition: background-color .15s ease, box-shadow .15s ease;
        box-shadow: 0 2px 6px rgba(57, 169, 0, 0.25);
    }
    .btn-sena-accent:hover,
    .btn-sena-accent:focus {
        background-color: #2f8c00;
        color: #fff;
        box-shadow: 0 4px 10px rgba(57, 169, 0, 0.35);
    }
</style>

<nav class="navbar navbar-expand-lg bg-white border-bottom py-2">
    <div class="container-fluid px-4 px-md-5">

        <!-- Logo y Nombre -->
        <a class="navbar-brand d-flex align-items-center me-4" href="{{ url('/') }}">
            <img src="{{ asset('images/LogoSena.png') }}" alt="Logo SENA" style="height: 65px;" class="me-2">

            <span class="fw-bold fs-2 text-dark mb-0" style="letter-spacing: -0.3px;">
                Admin<span style="color: #39A900;">SENA</span>
            </span>
        </a>

        <!-- Botón móvil -->
        <button class="navbar-toggler border-0" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#flatNavbarSena"
            aria-controls="flatNavbarSena"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MenUU -->
        <div class="collapse navbar-collapse" id="flatNavbarSena">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3 gap-lg-3 align-items-center">

                <li class="nav-item">
                    <a class="nav-link fw-bold text-dark px-3" href="{{ url('/') }}" style="font-size: 1.2rem;">
                        Inicio
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-semibold text-secondary px-4" href="{{ url('/#quienes-somos') }}" style="font-size: 1.2rem;">
                        ¿Quiénes Somos?
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold text-secondary px-2" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.2rem;">
                        Gestión Base
                    </a>
                    <ul class="dropdown-menu border-0 shadow-sm mt-2 rounded-3">
                        <li><a class="dropdown-item py-2" href="{{ route('training_center.create') }}" style="font-size: 1rem;">Centros de Formación</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('area.index') }}" style="font-size: 1rem;">Áreas</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('computer.create') }}" style="font-size: 1rem;">Equipos</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold text-secondary px-2" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.2rem;">
                        Operación Académica
                    </a>
                    <ul class="dropdown-menu border-0 shadow-sm mt-2 rounded-3">
                        <li><a class="dropdown-item py-2" href="{{ route('teacher.create') }}" style="font-size: 1rem;">Instructores</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('course.create') }}" style="font-size: 1rem;">Cursos / Fichas</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('apprentice.create') }}" style="font-size: 1rem;">Aprendices</a></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li><a class="dropdown-item py-2" href="{{ route('course_teacher.create') }}" style="font-size: 1rem;">Asignación Cursos/Instructores</a></li>
                    </ul>
                </li>

            </ul>

            <!--BUSCADOR-->
            <div class="d-flex align-items-center ms-auto my-2 my-lg-0 gap-5">

                <!-- BUSCA-->
                <form class="d-flex" role="search" style="max-width: 340px; width: 100%;">
        
                    <div class="input-group bg-light rounded-3 overflow-hidden ps-2 p-1 border-0 w-100">

                        <input
                            class="form-control border-0 bg-transparent ps-2 py-1 text-secondary shadow-none"
                            type="search"
                            placeholder="Buscar..."
                            aria-label="Search"
                            style="font-size: 1.05rem;">

                        <button
                            class="btn btn-sena-accent px-3 d-flex align-items-center justify-content-center"
                            type="submit">

                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Roles de acceso -->
                <div class="dropdown">

                    <button class="btn btn-sena-accent px-3 py-2 d-flex align-items-center gap-3 flex-shrink-0 dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            style="font-size: 1.1rem;">

                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                        Iniciar Sesión
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                        <li><a class="dropdown-item" href="{{ url('/login?role=aprendiz') }}">Aprendiz</a></li>
                        <li><a class="dropdown-item" href="{{ url('/login?role=administrador') }}">Administrador</a></li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</nav>
