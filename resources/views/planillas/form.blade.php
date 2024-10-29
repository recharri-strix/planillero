    <!-- resources/views/planillas/form.blade.php -->

    <!-- Campo de Fecha -->
    <label for="fecha">Fecha:</label>
    <input class="form-control" type="datetime-local" id="fecha" name="fecha" value="{{ old('fecha', $planilla->fecha ?? '') }}" required>

    <!-- Select para Jefe de Campo -->
    <label for="jefe_campo_id">Jefe de Campo:</label>
    <select class="form-select" id="jefe_campo_id" name="jefe_campo_id">
        <option value="">Seleccione un jefe de campo</option>
        @foreach($jefeCampos as $jefe)
            <option value="{{ $jefe->id }}" {{ old('jefe_campo_id', $planilla->jefe_campo_id ?? '') == $jefe->id ? 'selected' : '' }}>
                {{ $jefe->name }}
            </option>
        @endforeach
    </select>

    <!-- Select para Dirección del Viento -->
    <label for="dir_viento">Dirección del Viento:</label>
    <select class="form-select" id="dir_viento" name="dir_viento_id">
        <option value="">Seleccione la dirección del viento</option>
        @foreach($direccionesViento as $direccion)
            <option value="{{ $direccion->id }}" {{ old('dir_viento', $planilla->dir_viento ?? '') == $direccion->id ? 'selected' : '' }}>
                {{ $direccion->nombre }}
            </option>
        @endforeach
    </select>

    <!-- Select para Velocidad del Viento -->
    <label for="vel_viento">Velocidad del Viento:</label>
    <select class="form-select" id="vel_viento" name="vel_viento_id">
        <option value="">Seleccione la velocidad del viento</option>
        @foreach($velocidadesViento as $velocidad)
            <option value="{{ $velocidad->id }}" {{ old('vel_viento', $planilla->vel_viento ?? '') == $velocidad->id ? 'selected' : '' }}>
                {{ $velocidad->nombre }}
            </option>
        @endforeach
    </select>

    <!-- Select para Temperatura -->
    <label for="temperatura">Temperatura:</label>
    <select class="form-select" id="temperatura" name="temperatura_id">
        <option value="">Seleccione la temperatura</option>
        @foreach($temperaturas as $temperatura)
            <option value="{{ $temperatura->id }}" {{ old('temperatura', $planilla->temperatura ?? '') == $temperatura->id ? 'selected' : '' }}>
                {{ $temperatura->nombre }}
            </option>
        @endforeach
    </select>

    <!-- Select para Temperatura -->
    <label for="nube">Nubes:</label>
    <select class="form-select" class="form-select" id="nube" name="nube_id">
        <option value="">Seleccione tipo de nube</option>
        @foreach($nubes as $nube)
            <option value="{{ $nube->id }}" {{ old('nube', $planilla->nube_id ?? '') == $nube->id ? 'selected' : '' }}>
                {{ $nube->nombre }}
            </option>
        @endforeach
    </select>

    <!-- Select para Temperatura -->
    <label for="plafon">Plafons:</label>
    <select class="form-select" class="form-select" id="plafon" name="plafon_id">
        <option value="">Seleccione el plafon</option>
        @foreach($plafons as $plafon)
            <option value="{{ $plafon->id }}" {{ old('plafon', $planilla->plafon_id ?? '') == $plafon->id ? 'selected' : '' }}>
                {{ $plafon->nombre }}
            </option>
        @endforeach
    </select>

    <label for="novedades">Novedades:</label>
    <textarea class="form-control" id="novedades" name="novedades">{{ old('novedades', $planilla->novedades ?? '') }}</textarea>

    <button class="form-control btn btn-primary mt-3" type="submit">Guardar</button>
