<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planilla {{ $planilla->id }}</title>
<style>
body {
    font-family: 'Arial', sans-serif;
    margin: 20px;
    padding: 0;
    color: #333;
    background-color: #f4f4f4;
    font-size: 14px;
    line-height: 1.5;
}

h3 {
    text-align: center;
    color: #333;
    font-size: 15px;
    background-color: #fff;
    /* padding: 10px; */
    border: 1px solid #ddd;
    /* margin-bottom: 30px; */
}

.row {
    display: flex;
    margin-bottom: 20px;
}

.col-6 {
    flex: 0 0 50%;
    padding: 10px;
}

.col-6:first-child {
    border-right: none;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
}

th {
    background-color: #f2f2f2;
    color: #333;
    border: 1px solid #ccc;
    padding: 6px;
}

td {
    border: 1px solid #ccc;
    padding: 6px;
    text-align: left;
    color: #333;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    align: center;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

footer {
    margin-top: 20px;
    text-align: center;
    font-size: 10px;
    color: #777;
}
</style> 
</head>
<body>
    <div class="row">
        <table>
        <tr>
            <td colspan="2"><strong>Planeadores La Plata</strong></td>
        </tr>
        <tr>
            <td><strong>Planilla de Vuelo N°:</strong> {{ $planilla->id }}</td>
            <td><strong>Viento:</strong> {{ $planilla->dirViento?->nombre ?? 'N/A' }} <strong>Velocidad:</strong> {{ $planilla->velViento?->nombre ?? 'N/A' }} km/h</td>
        </tr>
        <tr>
            <td><strong>Lugar y Fecha:</strong> Gómez, {{ $planilla->fecha }}</td>
            <td><strong>Temperatura:</strong> {{ $planilla->temperatura?->nombre ?? 'N/A' }}°C</td>
        </tr>
        <tr>
            <td><strong>Jefe de Campo:</strong> {{ $planilla->jefeCampo?->name ?? 'N/A'  }}</strong></td>
            <td><strong>Nubes:</strong> {{ $planilla->nubes?->nombre ?? 'N/A' }}<strong> Plafond:</strong> {{ $planilla->plafon?->nombre ?? 'N/A' }}m</td>
        </tr>
        <tr>
            <td colspan="2">Novedades: {{ $planilla->novedades }}</td>
        </tr>
    </table>
    </div>
    <table>
        <tbody>
          <tr>
            <td rowspan="2">Nro</td>
            <td rowspan="2">Piloto</td>
            <td rowspan="2">Alum/Inst/Pasj</td>
            <td rowspan="2">Tema</td>
            <td colspan="6">Planeador</td>
            <td colspan="4">Avion</td>
            <td rowspan="2">Remolcador</td>
            <td rowspan="2">Tipo  Pago</td>
            <td rowspan="2">Pago</td>
          </tr>
          <tr>
            <td>Matricula</td>
            <td>Decolaje</td>
            <td>Corte</td>
            <td>Remolque</td>
            <td>Aterrizaje</td>
            <td>Librado</td>
            <td>Matricula</td>
            <td>Aterrizaje</td>
            <td>Parcial</td>
            <td>Total</td>
          </tr>
          <tr>
            <td>1</td>
            <td>2</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            <td>16</td>
          </tr>
        </tbody>
    </table>
    <!--<table>
        <thead>
            <tr>
                <th>Nro</th>
                <th>Piloto</th>
                <th>Alum/Inst/Pasj</th>
                <th>Tema</th>
                <th>Planeador</th>
                <th>Decolaje</th>
                <th>Corte</th>
                <th>Remolque</th>
                <th>Aterrizaje</th>
                <th>Librado</th>
                <th>Avión</th>
                <th>Aterrizaje Avión</th>
                <th>Parcial</th>
                <th>Remolcador</th>
                <th>Tipo de Pago</th>
                <th>Pago</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vuelos as $vuelo)
            <tr>
                <td>{{ $vuelo->id }}</td>
                <td>{{ $vuelo->piloto?->name ?? 'N/A' }}</td>
                <td>{{ $vuelo->instructor?->name ?? 'N/A' }}</td>
                <td>{{ $vuelo->tema?->nombre ?? 'N/A' }}</td>
                <td>{{ $vuelo->planeador?->nombre ?? 'N/A' }}</td>
                <td>{{ $vuelo->decolaje ? \Carbon\Carbon::parse($vuelo->decolaje)->format('H:i') : '' }}</td>
                <td>{{ $vuelo->corte ? \Carbon\Carbon::parse($vuelo->corte)->format('H:i') : '' }}</td>
                <td>{{ $vuelo->hora_remolque }}</td>
                <td>{{ $vuelo->aterrizaje ? \Carbon\Carbon::parse($vuelo->aterrizaje)->format('H:i') : '' }}</td>
                <td>{{ $vuelo->hora_librado }}</td>
                <td>{{ $vuelo->avion?->nombre ?? 'N/A' }}</td>
                <td>{{ $vuelo->aterrizaje_avion ? \Carbon\Carbon::parse($vuelo->aterrizaje_avion)->format('H:i') : '' }}</td>
                <td>{{ $vuelo->hora_parcial }}</td>
                <td>{{ $vuelo->remolcador?->name ?? 'N/A' }}</td>
                <td>{{ $vuelo->tipoPago?->nombre ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table> -->
    <footer>
        &copy; {{ date('Y-m-d') }} CPLP
    </footer>
</body>
</html>
