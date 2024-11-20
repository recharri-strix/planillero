<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Vuelos</title>
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
    <h3>Reporte de Vuelos</h3>
    <div class="row">
        Dirección Viento: {{ $planilla->dirViento?->nombre ?? 'N/A' }} - 
        Velocidad: {{ $planilla->velViento?->nombre ?? 'N/A' }} - 
        Temperatura: {{ $planilla->temperatura?->nombre ?? 'N/A' }} -
        Jefe Campo: {{ $planilla->jefeCampo?->name ?? 'N/A'  }} - 
        Novedades: {{ $planilla->novedades }}
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Nro</th>
                <th>Tema</th>
                <th>Instructor</th>
                <th>Piloto</th>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($vuelos as $vuelo)
            <tr>
                <td>{{ $vuelo->id }}</td>
                <td>{{ $vuelo->tema?->nombre ?? 'N/A' }}</td>
                <td>{{ $vuelo->instructor?->name ?? 'N/A' }}</td>
                <td>{{ $vuelo->piloto?->name ?? 'N/A' }}</td>
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
    </table>
    <footer>
        &copy; {{ date('Y-m-d') }} CPLP
    </footer>
</body>
</html>
