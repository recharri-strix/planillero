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
                        </div>
                    </div>

                    <div class="card-body">
                        <form id="reportForm" action="{{ route('planillas.filtrar') }}" method='GET'>
                            {{-- @csrf --}}
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
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table_data">
                                <thead class="thead">
                                    <tr>
                                        <th>Nro</th>
                                        <th>Fecha</th>
                                        <th>Jefe de campo</th>
                                        <th>Novedades</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($planillas as $item)
                                        <tr>
                                            <td>{{ $item->id}}</td>
                                            <td>{{ $item->fecha }}</td>
                                            <td>{{ $item->jefeCampo->name }}</td>
                                            <td>{{ $item->novedades }}</td>
                                            <td class="td-actions">
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('vuelos.index', $item->id)}}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Ver planilla de vuelos">
                                                    <i class="fa fa-fw fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (empty($planillas))
                                        <tr colspan="9" class="text-center">No hay cargados vuelos hasta el momento.
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if (!empty($planillas))
                    {!! $planillas->appends(request()->query())->links() !!}
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
