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
            </form>
        </div>
    </div>
</div>
@endsection
