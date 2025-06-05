<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comisiones Transfers</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen  items-center justify-center bg-gradient-to-r from-gray-800 via-gray-900 to-black p-4">

    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Comisiones</h1>
        <h2>Comisiones generadas</h2>
<p>Porcentaje aplicado: {{ comisiones }}%</p>

<table>
    <thead>
        <tr>
            <th>ID Reserva</th>
            <th>Fecha</th>
            <th>Precio</th>
            <th>Comisión</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comisiones as $c)
            <tr>
                <td>{{ $c['reserva_id'] }}</td>
                <td>{{ $c['fecha'] }}</td>
                <td>{{ $c['precio'] }} €</td>
                <td>{{ $c['comision'] }} €</td>
            </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Total acumulado:</strong> {{ $totalComisiones }} €</p>

</body>
