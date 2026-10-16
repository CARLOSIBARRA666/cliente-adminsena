@extends('layouts.app') {{-- ✅ CORREGIDO: 'layouts' en minúscula --}}

@section('content')
<!-- Contenedor con ancho más recogido (850px) -->
<div class="container my-5" style="max-width: 850px;">
    
    <!-- Encabezado Principal -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="fw-bold text-dark m-0" style="font-size: 1.75rem; letter-spacing: -0.5px;">Áreas del Centro</h1>
            <p class="text-secondary small m-0 mt-1">Listado y administración de las áreas de formación.</p>
        </div>
        <div>
           
            <a href="{{ route('area.create') }}" class="btn text-white fw-semibold px-4 py-2 shadow-sm custom-btn-create" style="background-color: #39A900; font-size: 0.85rem; letter-spacing: 0.5px; border-radius: 8px;">
                <i class="bi bi-plus-lg me-1"></i> NUEVA ÁREA
            </a>
        </div>
    </div>

    <!-- Bloque Principal Tipo Tarjeta Plana -->
    <div class="bg-white border rounded-3 shadow-sm overflow-hidden">
        
        <!-- Barra de Control Superior -->
        <div class="px-4 py-3 bg-light border-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <h5 class="fw-bold text-dark m-0" style="font-size: 1rem;">Listado de Áreas</h5>
            
           
            <form action="{{ route('area.index') }}" method="GET" class="d-flex align-items-center position-relative" style="max-width: 260px; width: 100%;">
                <input class="form-control bg-white border pe-5 py-2 small search-input-flat" type="search" name="search" placeholder="Buscar área..." value="{{ request('search') }}" style="font-size: 0.875rem; border-radius: 6px;">
                <button class="btn p-0 position-absolute end-0 me-3 d-flex align-items-center justify-content-center text-secondary opacity-75" type="submit" style="height: 100%;">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <!-- Tabla con márgenes internos ampliados en los extremos (px-5) -->
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0 style-flat-table">
                <thead class="table-light text-secondary uppercase small fw-semibold border-bottom">
                    <tr>
                        <!-- px-5 para mover ID a la derecha -->
                        <th class="px-5 py-3" style="width: 140px;">ID</th>
                        <th class="py-3 text-center">Nombre del Área</th>
                        <!-- px-5 para mover Acciones a la izquierda -->
                        <th class="px-5 py-3 text-end" style="width: 200px;">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse($areas as $area)
                        <tr>
                            <!-- ID despejado del borde izquierdo -->
                            <td class="px-5 py-3 fw-medium text-secondary">#{{ $area->id }}</td>
                            
                            <!-- Nombre del Área -->
                            <td class="py-3 text-center fw-semibold text-dark">
                                <a href="{{ route('area.show', $area->id) }}" class="text-decoration-none text-dark hover-link-sena text-capitalize">
                                    {{ $area->name }}
                                </a>
                            </td>
                            
                            <!-- Acciones despejadas del borde derecho -->
                            <td class="px-5 py-3 text-end align-middle">
                                <div class="d-inline-flex align-items-center justify-content-end gap-2">
                                    
                                    <!--  Ver Detalles -->
                                    <a href="{{ route('area.show', $area->id) }}" 
                                       class="btn btn-sm btn-light border text-secondary custom-action-btn" 
                                       title="Ver Detalles">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <!-- Editar -->
                                    <a href="{{ route('area.edit', $area->id) }}" 
                                       class="btn btn-sm btn-light border text-secondary custom-action-btn" 
                                       title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Eliminar -->
                                    <form action="{{ route('area.destroy', $area->id) }}" method="POST" class="m-0 p-0 d-inline-flex">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-delete-custom" title="Eliminar Area" onclick="return confirm('¿Estás seguro de que deseas eliminar esta area?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 18px; height: 18px;">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-secondary">
                                <i class="bi bi-folder-x fs-1 opacity-50 d-block mb-2"></i>
                                No se encontraron áreas registradas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        @if(method_exists($areas, 'links') && $areas->hasPages())
            <div class="px-4 py-3 bg-light border-top d-flex justify-content-center">
                {{ $areas->links() }}
            </div>
        @endif

    </div>
</div>

<!-- Estilos CSS -->
<style>
    .custom-btn-create:hover {
        background-color: #2e8500 !important;
    }

    .search-input-flat:focus {
        border-color: #39A900 !important;
        box-shadow: 0 0 0 3px rgba(57, 169, 0, 0.15) !important;
    }

    .style-flat-table th {
        font-size: 0.78rem;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        background-color: #f8f9fa;
    }
    
    .style-flat-table tr {
        border-bottom: 1px solid #f0f0f0;
    }

    .hover-link-sena:hover {
        color: #39A900 !important;
    }

    .custom-action-btn {
        background-color: #ffffff !important;
        width: 36px;
        height: 36px;
        border-radius: 8px !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        padding: 0;
    }

    .custom-action-btn:hover {
        background-color: #f4f4f4 !important;
        color: #39A900 !important;
        border-color: #39A900 !important;
    }

    .btn-delete-custom {
        background-color: #fef2f2;
        color: #ef4444;
        border: 1px solid #fee2e2;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        padding: 0;
    }

    .btn-delete-custom:hover {
        background-color: #ef4444;
        color: #ffffff;
        border-color: #ef4444;
    }
</style>
@endsection