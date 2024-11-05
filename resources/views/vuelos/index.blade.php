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
                            <div class="form-group col-md-4 d-flex push-right">
                                <a href="{{ route('vuelos.nueva', $planilla_id) }}" class="btn btn-info btn-sm">Nuevo
                                    vuelo</a>
                            </div>
                            <div class="form-group col-md-4 d-flex push-right">
                                <a href="{{ route('vuelos.imprimir', $planilla_id) }}" class="btn btn-warning btn-sm">Imprimir planilla</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {{--                             <form id="reportForm" action="{{ route('planillas.filtrar') }}" method='GET'>
                                 @csrf 
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="small mb-1" for="jefe_campo_id">Jefe de campo</label>
                                        <select class="form-select form-select-sm select2" id="jefe_campo_id"
                                            name="jefe_campo_id">
                                            <option value="">-- Seleccione --</option>
                                            @foreach ($jefeCampos as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $jefe_campo_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="small mb-1" for="fecha">Fecha</label>
                                        <input class="form-control form-control-sm" id="fecha" name="fecha" type="date"
                                            placeholder="Ingrese fecha desde" value="{{ $fecha }}" />
                                    </div>
                                    <div class="form-group col-md-2 d-flex align-items-end">
                                        <button id="submitInputs" class="btn btn-primary btn-sm" type="submit">Filtrar</button>
                                    </div>
                                    <div class="form-group col-md-4 d-flex align-items-end">
                                        <a href="{{ route('planillas.nueva') }}" class="btn btn-info btn-sm">Nueva Planilla</a>
                                    </div>
                                </div>
                            </form> --}}
                        {{-- <input type="hidden" name="planilla_id" id="planilla_id" value="{{ $planilla_id }}"> --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table_data">
                                <thead class="thead">
                                    <tr>
                                        <th>Nro</th>
                                        <th>Tema</th>
                                        <th>Piloto</th>
                                        <th>Planeador</th>
                                        <th>Decolaje</th>
                                        <th>Corte</th>
                                        <th>Aterrizaje</th>
                                        <th>Librado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vuelos as $item)
                                        <tr class="{{ !$item->aterrizaje ? 'verde-suave' : '' }}">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->tema->nombre }}</td>
                                            <td>{{ $item->piloto->name }}</td>
                                            <td>{{ $item->planeador->nombre }}</td>
                                            <td>{{ $item->decolaje ? \Carbon\Carbon::parse($item->decolaje)->format('H:i') : '' }}</td>
                                            <td>{{ $item->corte ? \Carbon\Carbon::parse($item->corte)->format('H:i') : '' }}</td>
                                            <td>{{ $item->aterrizaje ? \Carbon\Carbon::parse($item->aterrizaje)->format('H:i') : '' }}</td>
                                            <td>   
                                                {{ $item->hora_librado }}
                                            </td>
                                            <td class="td-actions">
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('vuelos.editar', $item->id) }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="Ver planilla de vuelos">
                                                    <i class="fa fa-fw fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (empty($vuelos))
                                        <tr colspan="9" class="text-center">No hay cargados vuelos hasta el momento.
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
    <script src="{{ asset('js/util.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "-- Seleccione --",
                allowClear: true
            });
        });
    </script>
@endsection
