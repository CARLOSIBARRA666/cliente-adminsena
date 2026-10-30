@extends('layouts.app')

@section('title', 'Registrar Área de Formación')

@section('content')
<div class="admin-module py-2">

    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon">
                <i class="bi bi-layers"></i>
            </div>

            <div>
                <div class="module-eyebrow">Gestión Base</div>
                <h1 class="module-title">Registrar Área</h1>
                <p class="module-subtitle">
                    Registra una nueva área de formación del SENA.
                </p>
            </div>
        </div>

        <a href="{{ route('area.index') }}" class="btn-modern">
            <i class="bi bi-arrow-left"></i> Volver al listado
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <strong>
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Por favor corrige los siguientes errores:
            </strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4 mt-1">
        <div class="col-lg-8 col-xl-6 mx-auto">

            <div class="panel-card">
                <div class="panel-header">
                    <div class="panel-title">
                        <i class="bi bi-plus-circle"></i> Información del área
                    </div>
                </div>

                <div class="panel-body">
                    <form action="{{ route('area.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="f-control has-icon mb-4">
                            <label class="label-modern" for="name">
                                Nombre del área
                            </label>

                            <i class="field-icon bi bi-tag"></i>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Ej: Desarrollo de Software"
                                maxlength="255"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="imagen" class="label-modern">
                                Imagen del área
                            </label>

                            <input
                                type="file"
                                id="imagen"
                                name="imagen"
                                class="form-control"
                                accept="image/jpeg,image/png,image/webp"
                                required>

                            <small class="text-muted">
                                Formatos permitidos: JPG, JPEG, PNG y WEBP.
                                Tamaño máximo: 5 MB.
                            </small>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('area.index') }}"
                               class="btn-modern justify-content-center w-50">
                                Cancelar
                            </a>

                            <button type="submit"
                                    class="btn-modern btn-modern-green justify-content-center w-50">
                                <i class="bi bi-check2-circle"></i>
                                Guardar área
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
