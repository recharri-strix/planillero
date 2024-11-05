<!-- resources/views/vuelos/form.blade.php -->

<input type="hidden" name="planilla_id" value="{{ $planilla_id }}">

<!-- Select para Tema -->
<label for="tema_id">Tema:</label>
<select class="form-select" id="tema_id" name="tema_id" required>
    <option value="">Seleccione un tema</option>
    @foreach($temas as $tema)
        <option value="{{ $tema->id }}" {{ old('tema_id', $vuelo->tema_id ?? '') == $tema->id ? 'selected' : '' }}>
            {{ $tema->nombre }}
        </option>
    @endforeach
</select>

<!-- Select para Piloto -->
<label for="piloto_id">Piloto:</label>
<select class="form-select" id="piloto_id" name="piloto_id" required>
    <option value="">Seleccione un piloto</option>
    @foreach($pilotos as $piloto)
        <option value="{{ $piloto->id }}" {{ old('piloto_id', $vuelo->piloto_id ?? '') == $piloto->id ? 'selected' : '' }}>
            {{ $piloto->name }}
        </option>
    @endforeach
</select>

<!-- Select para Avión -->
<label for="avion_id">Avión:</label>
<select class="form-select" id="avion_id" name="avion_id" required>
    <option value="">Seleccione un avión</option>
    @foreach($aviones as $avion)
        <option value="{{ $avion->id }}" {{ old('avion_id', $vuelo->avion_id ?? '') == $avion->id ? 'selected' : '' }}>
            {{ $avion->nombre }}
        </option>
    @endforeach
</select>

<!-- Select para Remolcador -->
<label for="remolcador_id">Remolcador:</label>
<select class="form-select" id="remolcador_id" name="remolcador_id" required>
    <option value="">Seleccione un remolcador</option>
    @foreach($remolcadores as $remolcador)
        <option value="{{ $remolcador->id }}" {{ old('remolcador_id', $vuelo->remolcador_id ?? '') == $remolcador->id ? 'selected' : '' }}>
            {{ $remolcador->name }}
        </option>
    @endforeach
</select>

<!-- Select para Planeador -->
<label for="planeador_id">Planeador:</label>
<select class="form-select" id="planeador_id" name="planeador_id" required>
    <option value="">Seleccione un planeador</option>
    @foreach($planeadores as $planeador)
        <option value="{{ $planeador->id }}" {{ old('planeador_id', $vuelo->planeador_id ?? '') == $planeador->id ? 'selected' : '' }}>
            {{ $planeador->nombre }}
        </option>
    @endforeach
</select>

<!-- Select para Instructor -->
<label for="instructor_id">Instructor:</label>
<select class="form-select" id="instructor_id" name="instructor_id" required>
    <option value="">Seleccione un instructor</option>
    @foreach($instructores as $instructor)
        <option value="{{ $instructor->id }}" {{ old('instructor_id', $vuelo->instructor_id ?? '') == $instructor->id ? 'selected' : '' }}>
            {{ $instructor->name }}
        </option>
    @endforeach
</select>

<!-- Select para Tipo de Pago -->
<label for="tipo_pago_id">Tipo de Pago:</label>
<select class="form-select" id="tipo_pago_id" name="tipo_pago_id" >
    <option value="">Seleccione el tipo de pago</option>
    @foreach($tiposPago as $pago)
        <option value="{{ $pago->id }}" {{ old('tipo_pago_id', $vuelo->tipo_pago_id ?? '') == $pago->id ? 'selected' : '' }}>
            {{ $pago->nombre }}
        </option>
    @endforeach
</select>

<!-- Campo de Decolaje -->
<label for="decolaje">Decolaje:</label>
<input class="form-control" type="time" id="decolaje" name="decolaje" value="{{ old('decolaje', $vuelo->hora_decolaje) }}">

<!-- Campo de Corte -->
<label for="corte">Corte:</label>
<input class="form-control" type="time" id="corte" name="corte" value="{{ old('corte', $vuelo->hora_corte) }}">

<!-- Campo de Aterrizaje -->
<label for="aterrizaje">Aterrizaje:</label>
<input class="form-control" type="time" id="aterrizaje" name="aterrizaje" value="{{ old('aterrizaje', $vuelo->hora_aterrizaje) }}">

<!-- Campo de Aterrizaje del Avión -->
<label for="aterrizaje_avion">Aterrizaje del Avión:</label>
<input class="form-control" type="time" id="aterrizaje_avion" name="aterrizaje_avion" value="{{ old('aterrizaje_avion', $vuelo->hora_aterrizaje_avion) }}">

<button class="form-control btn btn-primary mt-3" type="submit">Guardar</button>