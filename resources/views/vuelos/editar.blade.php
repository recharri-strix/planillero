<!-- resources/views/planillas/create.blade.php -->
@extends('layouts.main')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Modificar Vuelo</h3>

                <a href="{{ route('vuelos.index', $planilla_id) }}" class="btn btn-primary btn-sm float-right">Volver</a>
            </div>
            <div class="card-body">
                <form action="{{ route('vuelos.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $vuelo->id }}">
                    @include('vuelos.form')

                </form>
                @if ($vuelo->estado_id == null or $vuelo->estado_id == 1)
                    <form action="{{ route('vuelos.finalizar', $vuelo->id) }}" method="POST" class="w-100 mt-2">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm w-100">Finalizar</button>
                    </form>
                    <form action="{{ route('vuelos.anular', $vuelo->id) }}" method="POST" class="w-100 mt-1">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm w-100">Anular</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
