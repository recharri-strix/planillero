<!-- resources/views/planillas/create.blade.php -->
@extends('layouts.main')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Modificar Planilla</h3>
                <a href="{{ route('planillas.index') }}" class="btn btn-primary btn-sm">Volver</a>
            </div>
            <div class="card-body">
                <form action="{{ route('planillas.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $planilla->id }}">
                    @include('planillas.form')

                    @if ($planilla->estado_id != 2)
                        <td class="td-actions text-center">
                            {{-- <form action="{{ route('planillas.finalizar', $planilla->id) }}" method="post" class="p-0 m-0"> --}}
                            {{-- @csrf --}}
                            <button type="submit" class="btn btn-success w-100" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Finalizar planilla del día." name='finalizar'>
                                Finalizar planilla
                            </button>
                        </td>
                    @endif
                </form>

            </div>
        </div>
    </div>
@endsection
