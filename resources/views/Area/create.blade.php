@extends('layouts.app')

@section('title', 'Áreas de Formación')

@section('content')
<div class="admin-module py-2">

    <!-- Encabezado del módulo -->
    <div class="module-header">
        <div class="d-flex align-items-center gap-3">
            <div class="module-icon"><i class="bi bi-layers"></i></div>
            <div>
                <div class="module-eyebrow">Gestión Base</div>
                <h1 class="module-title">Áreas de Formación</h1>
                <p class="module-subtitle">Administra las áreas o ambientes de formación del SENA.</p>
            </div>
        </div>
        <a href="{{ route('area.index') }}" class="btn-modern"><i class="bi bi-list-ul"></i> Ver listado</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Por favor corrige los siguientes errores:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4 mt-1 justify-content-center">

        <!-- Formulario -->
        <div class="col-xl-6">
            <div class="panel-card" id="module-form">
                <div class="panel-header">
                    <div class="panel-title"><i class="bi bi-plus-circle"></i> Registrar área</div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('area.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="f-control has-icon mb-4">
                            <label class="label-modern" for="name">Nombre del área</label>
                            <i class="field-icon bi bi-tag"></i>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Ej: Desarrollo de Software">
                        </div>

                        <button type="submit" class="btn-modern btn-modern-green w-100 justify-content-center">
                            <i class="bi bi-check2-circle"></i> Guardar área
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
