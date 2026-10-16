@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
<div class="admin-module py-2">
    <div class="edit-wrap">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('computer.create') }}" class="btn-modern btn-modern-outline">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>
        </div>

        <div class="panel-card">
            <div class="panel-header">
                <div class="panel-title"><i class="bi bi-pencil-square"></i> Editar equipo de cómputo</div>
            </div>
            <div class="panel-body">
                <form action="{{ route('computer.update', $computer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="f-control has-icon mb-3">
                        <label class="label-modern" for="number">Número del equipo</label>
                        <i class="field-icon bi bi-123"></i>
                        <input type="number" id="number" name="number" value="{{ old('number', $computer->number) }}" required>
                    </div>

                    <div class="f-control has-icon mb-4">
                        <label class="label-modern" for="brand">Marca</label>
                        <i class="field-icon bi bi-cpu"></i>
                        <input type="text" id="brand" name="brand" value="{{ old('brand', $computer->brand) }}" required>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('computer.create') }}" class="btn-modern btn-modern-outline">Cancelar</a>
                        <button type="submit" class="btn-modern btn-modern-green">
                            <i class="bi bi-check2-circle"></i> Actualizar equipo
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection