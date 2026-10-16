@extends('layouts.app')

@section('content')

<div class="auth-container">

    <div class="auth-card">

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="auth-logo">
            <img src="{{ asset('images/LogoSena.png') }}" alt="Logo SENA">
        </div>

        <h2>Iniciar Sesión</h2>

        <p class="auth-subtitle">
            Ingresa a AdminSENA para continuar
        </p>

        <div class="auth-role">
            Rol seleccionado: <strong>{{ ucfirst(request('role', 'aprendiz')) }}</strong>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="role" value="{{ request('role', 'aprendiz') }}">

            <div class="form-group">
                <label for="email">Correo electrónico</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Ingresa tu correo"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
            </div>
<div class="form-group">
    <label for="password">Contraseña</label>
    <div class="password-field">
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Ingresa tu contraseña"
            required
        >
        <button type="button" class="toggle-password" data-target="password" aria-label="Mostrar contraseña"> 👁</button>
    </div>
</div>
            <div class="remember">
                <label>
                    <input type="checkbox" name="remember">
                    Recordarme
                </label>
            </div>

            <button type="submit" class="btn-auth">
                Iniciar Sesión
            </button>

        </form>

        <div class="auth-register">
            ¿No tienes una cuenta?
            <a href="{{ route('register') }}">
                Crear cuenta
            </a>
        </div>

    </div>

</div>

<style>

.auth-container {
    min-height: calc(100vh - 80px);
    background: #f8faf7;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 20px;
}

.auth-card {
    width: 100%;
    max-width: 430px;
    background: #ffffff;
    padding: 40px;
    border-radius: 25px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.10);
}

.auth-card form {
    max-width: none;
    margin: 0;
    padding: 0;
    background: transparent;
    border-radius: 0;
}

.auth-logo {
    text-align: center;
    margin-bottom: 20px;
}

.auth-logo img {
    width: 75px;
}

.auth-card h2 {
    text-align: center;
    color: #203a5f;
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 8px;
}

.auth-subtitle {
    text-align: center;
    color: #6b7280;
    margin-bottom: 30px;
}

.auth-role {
    text-align: center;
    background: #eef8e9;
    color: #276f00;
    border-radius: 10px;
    padding: 10px;
    margin-bottom: 22px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: 700;
    color: #374151;
    margin-bottom: 8px;
}

.form-group input {
    width: 100%;
    padding: 13px 16px;
    border: 1px solid #d1d5db;
    border-radius: 12px;
    outline: none;
    font-size: 1rem;
    transition: 0.2s;
}

.form-group input:focus {
    border-color: #fbfffa;
    box-shadow: 0 0 0 3px rgba(57,169,0,0.12);
}

.password-field {
    position: relative;
}

.password-field input {
    padding-right: 48px;
}

.toggle-password {
    position: absolute;
    top: 15%;
    right: 10px;
    border: 0;
    background: transparent;
    color: #070707;
    padding: 6px;
    cursor: pointer;
    font-size: 1.1rem;
}

.remember {
    margin-bottom: 20px;
    color: #5a6578;
    font-size: 0.95rem;
}

.remember input {
    accent-color: #f6fcf3;
    width: auto;
    padding: 0;
    margin: 0;
}

.btn-auth {
    width: 100%;
    border: none;
    background: #39A900;
    color: white;
    padding: 14px;
    border-radius: 30px;
    font-size: 1.05rem;
    font-weight: 700;
    cursor: pointer;
    transition: 0.3s;
}

.btn-auth:hover {
    background: #276f00;
    transform: translateY(-2px);
}

.auth-register {
    text-align: center;
    margin-top: 25px;
    color: #6b7280;
}

.auth-register a {
    color: #39A900;
    font-weight: 700;
    text-decoration: none;
}

.auth-register a:hover {
    text-decoration: underline;
}

</style>

<script>
document.querySelectorAll('.toggle-password').forEach((button) => {
    button.addEventListener('click', () => {
        const input = document.getElementById(button.dataset.target);
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        button.setAttribute('aria-label', isPassword ? 'Ocultar contraseña' : 'Mostrar contraseña');
    });
});
</script>

@endsection
