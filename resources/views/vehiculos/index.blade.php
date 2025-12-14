@extends('layouts.app')

@section('titulo', 'Vehículos')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold">Vehículos</h1>

    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary btn-lg shadow">
        ➕ Nuevo Vehículo
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Placa</th>
                        <th>Tipo</th>
                        <th>Propietario</th>
                        <th>Ingreso</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($vehiculos as $vehiculo)
                        <tr>
                            <td class="fw-bold">{{ $vehiculo->placa }}</td>

                            <td>
                                <span class="badge 
                                    {{ $vehiculo->tipo == 'Automóvil' ? 'bg-primary' : '' }}
                                    {{ $vehiculo->tipo == 'Motocicleta' ? 'bg-warning text-dark' : '' }}
                                    {{ $vehiculo->tipo == 'Camioneta' ? 'bg-success' : '' }}">
                                    {{ $vehiculo->tipo }}
                                </span>
                            </td>

                            <td>{{ $vehiculo->propietario ?? '-' }}</td>

                            <td>{{ $vehiculo->created_at->format('d/m/Y H:i') }}</td>

                            <td class="text-center">
                                <a href="{{ route('vehiculos.edit', $vehiculo) }}"
                                   class="btn btn-sm btn-warning">
                                    ✏️ Editar
                                </a>

                                <form action="{{ route('vehiculos.destroy', $vehiculo) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Eliminar vehículo?')">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($vehiculos->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                No hay vehículos registrados
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
