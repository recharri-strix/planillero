@extends('layouts.main')

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Planillas de vuelos') }}
                        </span>
                        @if ($planilla->estado_id == 1)
                        <div class="form-group col-md-4 d-flex push-right">
                            <a href="{{ route('vuelos.nueva', $planilla->id) }}" class="btn btn-info btn-sm">Nuevo
                                vuelo</a>
                        </div>
                        @endif
                        <div class="form-group col-md-4 d-flex push-right">
                            <a href="{{ route('vuelos.imprimir', $planilla->id) }}"
                                class="btn btn-warning btn-sm">Imprimir planilla</a>
                        </div>
                        <a href="{{ route('planillas.index') }}" class="btn btn-primary btn-sm float-right">Volver</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table_data">
                            <thead class="thead">
                                <tr>
                                    <th class="text-center">Nro</th>
                                    <th class="d-none d-md-table-cell">Tema</th> <!-- Oculto en móviles -->
                                    <th>Piloto</th>
                                    <th>Planeador</th>
                                    <th>Decolaje</th>
                                    <th>Corte</th>
                                    <th>Aterrizaje</th>
                                    <th>Librado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vuelos as $item)
                                <tr class="{{ !$item->aterrizaje ? 'verde-suave' : '' }}">
                                    <td class="text-center">
                                        <h3><span
                                                class="{{ $item->estado_id == 2
                                                        ? 'badge rounded-pill bg-success'
                                                        : ($item->estado_id == 3
                                                            ? 'badge rounded-pill bg-danger'
                                                            : '') }}
                                                        ">{{ $item->id }}</span>
                                            @if ($item->decolaje != null)
                                            🛩️
                                            @endif
                                        </h3>
                                    </td>
                                    <td class="d-none d-md-table-cell">{{ $item->tema_nombre }}</td>
                                    <!-- Oculto en móviles -->
                                    <td>{{ $item->piloto->name }}</td>
                                    <td>{{ $item->planeador->nombre }}</td>
                                    <td>{{ $item->decolaje ? \Carbon\Carbon::parse($item->decolaje)->format('H:i') : '' }}
                                    </td>
                                    <td>{{ $item->corte ? \Carbon\Carbon::parse($item->corte)->format('H:i') : '' }}
                                    </td>
                                    <td>{{ $item->aterrizaje ? \Carbon\Carbon::parse($item->aterrizaje)->format('H:i') : '' }}
                                    </td>
                                    <td>{{ $item->hora_librado }}</td>
                                    <td class="td-actions text-center">
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('vuelos.editar', $item->id) }}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Ver planilla de vuelos">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @if ($vuelos->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center">No hay cargados vuelos hasta el momento.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if (!empty($vuelos))
            {!! $vuelos->appends(request()->query())->links() !!}
            @endif
        </div>
    </div>
</div>
@endsection