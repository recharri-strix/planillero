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
                <td><strong>Viento:</strong> {{ $planilla->dirViento?->nombre ?? '' }} <strong>Velocidad:</strong> {{ $planilla->velViento?->nombre ?? '' }} km/h</td>
            </tr>
            <tr>
                <td><strong>Lugar y Fecha:</strong> Gómez, {{ $planilla->fecha ? \Carbon\Carbon::parse($planilla->fecha)->format('d/m/Y') : ''}}</td>
                <td><strong>Temperatura:</strong> {{ $planilla->temperatura?->nombre ?? '' }}°C</td>
            </tr>
            <tr>
                <td><strong>Jefe de Campo:</strong> {{ $planilla->jefeCampo?->name ?? ''  }}</strong></td>
                <td><strong>Nubes:</strong> {{ $planilla->nubes?->nombre ?? '' }}<strong> Plafond:</strong> {{ $planilla->plafon?->nombre ?? '' }}m</td>
            </tr>
            <!-- <tr>
                <td colspan="2">Novedades: {{ $planilla->novedades }}</td>
            </tr> -->
        </table>
    </div>
    <table>
        <tbody>
            <tr>
                <td rowspan="2" text-align="center">Nro</td>
                <td rowspan="2" text-align="center">Piloto</td>
                <td rowspan="2" text-align="center">Alum/Inst/Pasj</td>
                <td rowspan="2" text-align="center">Tema</td>
                <td colspan="6" style="text-align:center;">Planeador</td>
                <td colspan="3" style="text-align:center;">Avion</td>
                <td rowspan="2" text-align="center">Remolcador</td>
                <td rowspan="2" text-align="center">Tipo Pago</td>
                <td rowspan="2" text-align="center">Pago</td>
            </tr>
            <tr>
                <td text-align="center">Matricula</td>
                <td text-align="center">Decolaje</td>
                <td text-align="center">Corte</td>
                <td text-align="center">Remolque</td>
                <td text-align="center">Aterrizaje</td>
                <td text-align="center">Librado</td>
                <td text-align="center">Matricula</td>
                <td text-align="center">Aterrizaje</td>
                <td text-align="center">Parcial</td>
                <!-- <td text-align="center">Total</td> -->
            </tr>
            @foreach ($vuelos as $vuelo)
            <tr>
                <td>{{ $vuelo->id }}</td>
                <td>{{ $vuelo->piloto?->name ?? '' }}</td>
                <td>{{ $vuelo->instructor?->name ?? '' }} {{ $vuelo->bau ?? '' }}</td>
                <td>{{ $vuelo->tema?->nombre ?? '' }}</td>
                <td>{{ $vuelo->planeador?->nombre ?? '' }}</td>
                <td>{{ $vuelo->decolaje ? \Carbon\Carbon::parse($vuelo->decolaje)->format('H:i') : '' }}</td>
                <td>{{ $vuelo->corte ? \Carbon\Carbon::parse($vuelo->corte)->format('H:i') : '' }}</td>
                <td>{{ $vuelo->hora_remolque }}</td>
                <td>{{ $vuelo->aterrizaje ? \Carbon\Carbon::parse($vuelo->aterrizaje)->format('H:i') : '' }}</td>
                <td>{{ $vuelo->hora_librado }}</td>
                <td>{{ $vuelo->avion?->nombre ?? '' }}</td>
                <td>{{ $vuelo->aterrizaje_avion ? \Carbon\Carbon::parse($vuelo->aterrizaje_avion)->format('H:i') : '' }}</td>
                <td>{{ $vuelo->hora_parcial }}</td>
                <!-- <td></td> -->
                <td>{{ $vuelo->remolcador?->name ?? '' }}</td>
                <td>{{ $vuelo->tipoPago?->nombre ?? '' }}</td>
                <td>{{ $vuelo->pago }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <table>
            <tr>
                <td>
                    <pre><strong>Novedades:</strong><br>{{ $planilla->novedades }}</pre>
                </td>
            </tr>
        </table>
    </div>
    <footer>
        &copy; {{ date('Y-m-d') }} CPLP
    </footer>
</body>

</html>