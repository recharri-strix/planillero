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
                            <div class="form-group col-md-4 d-flex align-items-end">
                                <a href="{{ route('planillas.nueva') }}" class="btn btn-info btn-sm">Nueva Planilla</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form id="reportForm" action="{{ route('planillas.filtrar') }}" method="GET">
                            <div class="row d-flex flex-wrap align-items-end">
                                <div class="col-8 col-md-2">
                                    <label class="small mb-1" for="fecha">Fecha</label>
                                    <input class="form-control form-control-sm" id="fecha" name="fecha" type="date"
                                        placeholder="Ingrese fecha desde" value="{{ $fecha }}" />
                                </div>
                                <div class="col-4 col-md-2 d-flex align-items-end">
                                    <button id="submitInputs" class="btn btn-primary btn-sm w-100" type="submit">Filtrar</button>
                                </div>
                            </div>
                        </form>                        
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table_data">
                                <thead class="thead">
                                    <tr>
                                        <th class="text-center">Nro</th>
                                        <th>Fecha</th>
                                        <th class="d-none d-md-table-cell">Jefe de campo</th> <!-- Oculto en móviles -->
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($planillas as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->id }}</td>
                                            <td>{{ $item->fecha_tb }}</td>
                                            <td class="d-none d-md-table-cell">{{ $item->jefeCampo->name }}</td> <!-- Oculto en móviles -->
                                            <td class="td-actions text-center">
                                                <a class="btn btn-sm btn-warning" href="{{ route('planillas.editar', $item->id) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Editar planilla del día">
                                                    <i class="fa fa-fw fa-edit"></i>
                                                </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('vuelos.index', $item->id) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Ver planilla de vuelos">
                                                    <i class="fa-solid fa-plane"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if ($planillas->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center">No hay cargados vuelos hasta el momento.</td>
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

@endsection
