
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

        <h2>Crear Cuenta</h2>

        <p class="auth-subtitle">
            Regístrate en AdminSENA
        </p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nombre completo</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Ingresa tu nombre"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Ingresa tu correo"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Crea una contraseña"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password_confirmation">
                    Confirmar contraseña
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Repite tu contraseña"
                    required
                >
            </div>

            <button type="submit" class="btn-auth">
                Crear Cuenta
            </button>

        </form>

        <div class="auth-register">
            ¿Ya tienes una cuenta?
            <a href="{{ route('login') }}">
                Iniciar Sesión
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

.form-group {
    margin-bottom: 18px;
}

.form-group label {
    display: block;
    font-weight: 700;
    color: #e0eff0;
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
    border-color: #39A900;
    box-shadow: 0 0 0 3px rgba(57,169,0,0.12);
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

@endsection