@extends('layouts.app')

@section('title', 'Editar Área')

@section('content')
<div class="admin-module py-2">
    <div class="edit-wrap">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('area.index') }}" class="btn-modern btn-modern-outline">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>
        </div>

        <div class="panel-card">
            <div class="panel-header">
                <div class="panel-title"><i class="bi bi-pencil-square"></i> Editar área de formación</div>
            </div>
            <div class="panel-body">
                <form action="{{ route('area.update', $area->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="f-control has-icon mb-4">
                        <label class="label-modern" for="name">Nombre del área</label>
                        <i class="field-icon bi bi-tag"></i>
                        <input type="text" id="name" name="name" value="{{ old('name', $area->name) }}" required>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('area.index') }}" class="btn-modern btn-modern-outline">Cancelar</a>
                        <button type="submit" class="btn-modern btn-modern-green">
                            <i class="bi bi-check2-circle"></i> Actualizar área
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection