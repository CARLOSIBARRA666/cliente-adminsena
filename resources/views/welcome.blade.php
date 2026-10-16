@extends('layouts.app')

@section('content')

<main class="adminsena-landing">

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container hero-container">
            <div class="hero-content">
                <span class="badge-tag">
                    <i class="fa-solid fa-laptop-code"></i>Gestión SENA
                </span>
                <h1 class="hero-title">Enfocado en Solución y Modernización</h1>
                <p class="hero-subtitle">
                    Control en tiempo real de recursos tecnológicos, ambientes de aprendizaje y programación de fichas en un solo lugar.
                </p>
                <a href="#modulos" class="btn-primary-hero">Comenzar Ahora</a>
            </div>

            <!-- CARRUSEL HERO -->
            <div class="hero-carousel-wrapper">
                <div id="carruselSena" class="carousel slide carrusel-sena" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carruselSena" data-bs-slide-to="0" class="active" aria-current="true"></button>
                        <button type="button" data-bs-target="#carruselSena" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#carruselSena" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://i.pinimg.com/736x/44/d0/9f/44d09f6fb02f5aeb7eee8edf6d839c86.jpg" class="d-block w-100" alt="Ambiente de Formación">
                        </div>
                        <div class="carousel-item">
                            <img src="https://elestudiodeactores.com/wp-content/uploads/2023/04/el-sena-certifica-nuestros-actores.jpeg" class="d-block w-100" alt="Gestión de Equipos">
                        </div>
                        <div class="carousel-item">
                            <img src="https://i.pinimg.com/1200x/cd/8c/4b/cd8c4bd165e9db4c1043b48d99839274.jpg" class="d-block w-100" alt="Fichas Académicas">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carruselSena" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carruselSena" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- BIENVENIDA -->
<section id="quienes-somos" class="welcome-section">
    <div class="container welcome-container">
        <div class="welcome-text-content">
            <h2 class="section-title">¿Qué es AdminSENA?</h2>
            <p class="section-paragraph">
               Una solución digital integral creada para simplificar la administración de recursos en el SENA. Facilita el control preciso de activos tecnológicos, la organización horaria de los grupos y el seguimiento seguro de los espacios educativos.
            </p>
            <div class="welcome-buttons">
                <a href="#quienes-somos" class="btn-green-dark">
                    <i class="fa-solid fa-circle-info"></i>Explorar plataforma
                </a>
                <a href="https://www.sena.edu.co/" class="link-simple" target="_blank" rel="noopener noreferrer">Ver manual de uso</a>
            </div>
        </div>

        <div class="welcome-image-wrapper">
            <div class="main-image-card">
                <img src="https://cdn.colombia.com/sdi/2022/11/24/que-es-territorium-en-el-sena-1090764.jpg" alt="Ambiente SENA" class="img-fluid-rounded">
            </div>
        </div>
    </div>
</section>


    <!-- PILARES / TARJETAS -->
    <section id="modulos" class="cards-section">
        <div class="container">
            <h2 class="grid-section-title">Enfoque Profesional e Innovador</h2>
            <div class="rounded-cards-grid">
                
                <div class="rounded-card">
                    <img src="https://www.wradio.com.co/resizer/v2/RGIAKSMRRNGU3OBW535ZJVXPHY.jpg?auth=6bb23eef45fc0d6e294d9289335d29c51964e91080ef949a23431f26d4861dd2" alt="Misión" class="card-img">
                    <div class="card-body-content">
                        <h3>Misión del Sistema</h3>
                        <p>Garantizar la trazabilidad precisa y el control eficiente de los equipos y recursos tecnológicos en todos los ambientes de formación del SENA.</p>
                        <a href="#quienes-somos" class="btn-card-action">Ver Detalles</a>
                    </div>
                </div>

                <div class="rounded-card">
                    <img src="https://www.tropicanafm.com/wp-content/uploads/2026/01/05012026-Salario-aprendices-SENA.jpg" alt="Visión" class="card-img">
                    <div class="card-body-content">
                        <h3>Visión y Escalabilidad</h3>
                        <p>Impulsar la expansión del sistema hacia múltiples centros y sedes con una infraestructura moderna, segura y adaptable.</p>
                        <a href="https://www.sena.edu.co/" class="btn-card-action" target="_blank" rel="noopener noreferrer">Plan de Ruta</a>
                    </div>
                </div>

                <div class="rounded-card">
                    <img src="https://www.agenciapi.co/sites/default/files/styles/imagen_principal_contenidos_2021/public/2024-10/sena%204%20octubre.jpg.webp?h=7d7e118b&itok=kadfvtXN" alt="Compromiso" class="card-img">
                    <div class="card-body-content">
                        <h3> Gestión de Fichas</h3>
                        <p>Centralizar la administración de programas de formación, optimizando la asignación de instructores, aprendices, ambientes y horarios académicos.</p>
                        <a href="{{ route('course.create') }}" class="btn-card-action">Ir a Fichas</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

      <!-- NOTICIAS -->
    <section id="noticias" class="news-section">
        <div class="container">
            <div class="news-heading">
                <div>
                    <span class="section-kicker">Noticias y actualidad</span>
                    <h2 class="grid-section-title">Temas de interés</h2>
                </div>
                <div class="news-filters" role="group" aria-label="Filtrar noticias por perfil">
                    <button type="button" class="news-filter active" data-role="Todos">Todos</button>
                    <button type="button" class="news-filter" data-role="Aspirante">Aspirantes</button>
                    <button type="button" class="news-filter" data-role="Aprendiz">Aprendices</button>
                    <button type="button" class="news-filter" data-role="Egresado">Egresados</button>
                </div>
            </div>

            <div class="news-grid">
                @foreach ($news as $item)
                    <a class="news-card" data-news-role="{{ $item['role'] }}" href="{{ $item['url'] }}" target="_blank" rel="noopener noreferrer">
                        <div class="news-image-wrap">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="news-image">
                            <span class="news-role">{{ $item['role'] }}</span>
                        </div>
                        <div class="news-card-content">
                            <time datetime="2026-08-{{ 25 - $loop->index }}">{{ $item['date'] }}</time>
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['summary'] }}</p>
                            <span class="news-read">Leer noticia <i class="fa-solid fa-arrow-right"></i></span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


</main>

<button id="btnVolverArriba" class="btn-scroll-top" aria-label="Volver arriba">↑</button>

<style>
/* VARIABLES Y GENERALES */
:root {
    --color-verde-principal:#39A900; border: none;;
    --color-verde-oscuro: #39A900; border: none;;
    --color-crema-fondo: #f8faf7;
    --color-blanco: #ffffff;
    --color-texto: #2d3748;
    --color-texto-mutado: #809ccc;
}

.adminsena-landing {
    background-color: var(--color-crema-fondo);
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    color: var(--color-texto);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* HERO SECTION */
.hero-section { 
    margin: 18px 0 0;
    padding: 60px 0 80px;
    background: linear-gradient(135deg, #eef8e9 0%, #ffffff 100%);
    border: 1px solid rgba(57, 169, 0, 0.18);
    border-radius: 28px;
    box-shadow: 0 14px 32px rgba(39, 111, 0, 0.12);
    overflow: hidden;
}
.hero-container { 
    display: grid; 
    grid-template-columns: 1fr 1fr; 
    gap: 40px; 
    align-items: center; }
.hero-content { 
    display: flex; 
    flex-direction: column; 
    gap: 20px; 
    align-items: flex-start; }

.badge-tag {
    background-color: var(--color-blanco);
    color: var(--color-verde-oscuro);
    padding: 8px 18px;
    border-radius: 30px;
    font-size: 0.9rem;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.hero-title { font-size: 3rem; font-weight: 800; color: #203a5f; line-height: 1.15; margin: 0; }
.hero-subtitle { font-size: 1.1rem; color: var(--color-texto-mutado); line-height: 1.6; margin: 0; }

.btn-primary-hero {
    background-color: var(--color-verde-principal); /* relleno */
    color: var(--color-blanco); /* texto */
    padding: 16px 34px; /* tamaño */
    border-radius: 30px;
    text-decoration: none;
    font-weight: 700;
    border: 2px solid var(--color-verde-oscuro); /* borde */
    box-shadow: 0 8px 20px rgba(57, 169, 0, 0.25); /* sombra */
    transition: all 0.3s ease;
}
.btn-primary-hero:hover {
    transform: translateY(-3px); /* elevación */
    background-color: var(--color-verde-oscuro); /* hover */
    color: var(--color-blanco);
}

.hero-carousel-wrapper .carousel-inner { border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); }
.hero-carousel-wrapper img { height: 400px; object-fit: cover; }

/* BUSCADOR FLOTANTE */
.search-floating-section { margin-top: -50px; margin-bottom: 60px; position: relative; z-index: 10; }
.floating-search-bar {
    background: var(--color-blanco);
    padding: 16px 24px;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 20px;
    box-shadow: 0 15px 35px rgba(39, 111, 0, 0.1);
    border: 1px solid rgba(57, 169, 0, 0.15);
}
.search-col { flex: 1; display: flex; flex-direction: column; }
.search-label { font-size: 0.75rem; font-weight: 700; color: var(--color-verde-oscuro); text-transform: uppercase; }
.search-input, .search-select { border: none; outline: none; font-size: 0.95rem; background: transparent; width: 100%; }
.search-divider { width: 1px; height: 40px; background-color: #e2e8f0; }

.btn-search {
    background-color: var(--color-verde-oscuro);
    color: var(--color-blanco);
    border: none;
    padding: 14px 28px;
    border-radius: 30px;
    font-weight: 700;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.btn-search:hover { background-color: var(--color-verde-principal); }

/* SECCIÓN BIENVENIDA */
.welcome-section { padding: 40px 0 80px; }
.welcome-container { display: grid; grid-template-columns: 1.1fr 1fr; gap: 60px; align-items: center; }
.section-title { font-size: 2.3rem; font-weight: 800; }
.section-paragraph { font-size: 1.05rem; line-height: 1.7; color: var(--color-texto-mutado); }
.welcome-buttons { display: flex; align-items: center; gap: 20px; margin-top: 10px; }

.btn-green-dark {
    background-color: var(--color-verde-oscuro);
    color: var(--color-blanco);
    padding: 12px 26px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.link-simple { color: var(--color-texto); text-decoration: none; font-weight: 600; border-bottom: 2px solid var(--color-verde-oscuro); }

.main-image-card {
    position: relative;
    background: var(--color-blanco);
    padding: 14px;
    border-radius: 24px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.06);
}
.img-fluid-rounded { width: 100%; height: 300px; object-fit: cover; border-radius: 16px; }

.floating-badge-top {
    position: absolute; top: -15px; right: -15px;
    background: var(--color-verde-oscuro); color: var(--color-blanco);
    padding: 8px 16px; border-radius: 20px; font-size: 0.85rem; font-weight: 700;
}
.floating-badge-bottom {
    position: absolute; bottom: -15px; left: -15px;
    background: #ff6b00; color: var(--color-blanco);
    width: 48px; height: 48px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
}

/* NOTICIAS */
.news-section {
    padding: 40px 0 80px;
    background: var(--color-blanco); /* fondo */
    margin: 40px 0; /* separación */
}
.news-heading { display: flex; align-items: end; justify-content: space-between; gap: 24px; margin-bottom: 30px; }
.section-kicker { color: var(--color-verde-principal); font-size: .78rem; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; }
.news-heading .grid-section-title { text-align: left; margin: 8px 0 0; }
.news-filters { display: flex; flex-wrap: wrap; justify-content: flex-end; gap: 8px; }

.news-filter {
    border: none; /* borde */
    background: #f1f4f3; /* relleno */
    color: var(--color-texto);
    padding: 10px 18px; /* tamaño */
    border-radius: 999px;
    cursor: pointer;
    font-weight: 700;
    transition: all 0.25s ease; /* suavizado */
}
.news-filter.active,
.news-filter:hover {
    background: var(--color-verde-principal);
    border-color: var(--color-verde-principal);
    color: var(--color-blanco);
    box-shadow: 0 6px 14px rgba(57, 169, 0, 0.25); /* sombra */
}

.news-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 28px; }

.news-card {
    display: flex;
    flex-direction: column;
    overflow: hidden;
    background: var(--color-blanco);
    color: inherit;
    text-decoration: none;
    border: none; /* borde */
    border-radius: 24px; /* redondeo */
    padding: 10px; /* margen */
    box-shadow: 0 10px 25px rgba(0,0,0,0.05); /* sombra */
    transition: transform .3s ease, box-shadow .3s ease;
}
.news-card:hover {
    color: inherit;
    transform: translateY(-6px); /* elevación */
    box-shadow: 0 18px 34px rgba(32, 58, 95, .13);
}
.news-card.is-hidden { display: none; }

.news-image-wrap {
    height: 210px;
    position: relative;
    overflow: hidden;
    border-radius: 18px; /* redondeo */
    background: #e9edea; /* respaldo */
}
.news-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    color: transparent;
    font-size: 0;
    transition: transform .4s ease; /* zoom */
}
.news-card:hover .news-image { transform: scale(1.04); }

.news-role {
    position: absolute;
    top: 14px;
    left: 14px;
    padding: 6px 14px; /* tamaño */
    border-radius: 20px; /* redondeo */
    background: var(--color-verde-principal);
    color: var(--color-blanco);
    font-size: .75rem;
    font-weight: 800;
    text-transform: uppercase;
}

.news-card-content { display: flex; flex: 1; flex-direction: column; padding: 20px 14px 14px; }
.news-card-content time { color: #789087; font-size: .78rem; font-weight: 700; }
.news-card-content h3 { margin: 10px 0 8px; color: #203a5f; font-size: 1.18rem; line-height: 1.35; }
.news-card-content p { margin: 0 0 18px; color: var(--color-texto-mutado); line-height: 1.55; }

.news-read {
    margin-top: auto;
    color: var(--color-verde-principal);
    font-size: .9rem;
    font-weight: 800;
    display: inline-flex; /* alineación */
    align-items: center; /* alineación */
    gap: 6px; /* espacio */
}
.news-read i { margin-left: 0; }

/* PILARES / TARJETAS */
.cards-section { padding: 20px 0 80px; }
.grid-section-title { font-size: 2.2rem; font-weight: 800; text-align: center; margin-bottom: 40px; }
.rounded-cards-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px; }

.rounded-card {
    background: var(--color-blanco);
    border-radius: 24px;
    padding: 16px;
    display: flex; flex-direction: column;
    box-shadow: 0 10px 25px rgba(0,0,0,0.03);
    transition: transform 0.3s ease;
}
.rounded-card:hover { transform: translateY(-6px); }
.card-img { width: 100%; height: 200px; object-fit: cover; border-radius: 16px; }
.card-body-content { padding: 20px 10px 10px; text-align: center; display: flex; flex-direction: column; gap: 12px; }
.btn-card-action {
    background: var(--color-verde-principal); color: var(--color-blanco);
    text-decoration: none; padding: 10px 24px; border-radius: 20px; font-weight: 700; align-self: center;
}

/* BOTÓN IR ARRIBA */
.btn-scroll-top {
    position: fixed; bottom: 30px; left: 30px; z-index: 100;
    width: 48px; height: 48px; border-radius: 50%; border: none;
    background: var(--color-verde-oscuro); color: white; font-size: 20px;
    cursor: pointer; opacity: 0; visibility: hidden; transition: all 0.3s ease;
}
.btn-scroll-top.show { opacity: 1; visibility: visible; }

/* RESPONSIVO */
@media (max-width: 991px) {
    .hero-container, .welcome-container { grid-template-columns: 1fr; }
    .hero-content { text-align: center; align-items: center; }
    .floating-search-bar { flex-direction: column; border-radius: 24px; }
    .search-divider { display: none; }
    .btn-search { width: 100%; }
    .news-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    .news-heading { align-items: flex-start; flex-direction: column; }
    .news-filters { justify-content: flex-start; }
}

@media (max-width: 640px) {
    .news-grid { grid-template-columns: 1fr; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('btnVolverArriba');
    if (btn) {
        window.addEventListener('scroll', () => btn.classList.toggle('show', window.scrollY > 400));
        btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }

    document.querySelectorAll('.news-filter').forEach((filter) => {
        filter.addEventListener('click', () => {
            const selectedRole = filter.dataset.role;

            document.querySelectorAll('.news-filter').forEach((button) => button.classList.remove('active'));
            filter.classList.add('active');
            document.querySelectorAll('.news-card').forEach((card) => {
                card.classList.toggle('is-hidden', selectedRole !== 'Todos' && card.dataset.newsRole !== selectedRole);
            });
        });
    });
});
</script>

@endsection