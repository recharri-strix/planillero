<!-- resources/views/planillas/create.blade.php -->
@extends('layouts.main')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Modificar Vuelo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('vuelos.store') }}" method="POST">
                @csrf 
                <input type="hidden" name="id" value="{{ $vuelo->id }}">
                @include('vuelos.form')
                
            </form>
        </div>
    </div>
</div>
@endsection
