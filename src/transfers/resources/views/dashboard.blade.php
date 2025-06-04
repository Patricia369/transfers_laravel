<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Transfers</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen  items-center justify-center bg-gradient-to-r from-gray-800 via-gray-900 to-black p-4">
    @if(session('error'))
    <p class="text-red-500">{{ session('error') }}</p>
    @endif

    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">DASHBOARD ADMINISTRADOR</h1>

        <form action="{{ route('reservaXlocalizador') }}" method="POST" id="reservaForm" class="space-y-6">
            @csrf
            <div class="flex justify-end space-y-4 flex space-x-4">
                <span class="border-l border-blue-500 my-2"></span>
                <a href="{{ route('reserva') }}" class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-500 transition-colors duration-300 shadow-md">
                    Hacer Reserva
                </a>
                <span class="border-l border-blue-500 my-2"></span>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-green-600 rounded-lg hover:bg-green-500 transition-colors duration-300 shadow-md">
                    Registrar usuario
                </a>
                <a href="{{ route('comisiones') }}" class="px-4 py-2 bg-green-600 rounded-lg hover:bg-green-500 transition-colors duration-300 shadow-md">
                    Mostrar comisiones
                </a>
            </div>
        </form>
    </div>
    <div>
        <form action="{{ route('reservaXlocalizador') }}" method="GET">
            <label for="localizador">Buscar por localizador:</label>
            <input type="text" name="localizador" required>
            <button type="submit">Buscar</button>
        </form>

    </div>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Detalles de la Reserva</h1>
        @if(isset($reserva))
        <h2>Reserva: {{ $reserva->localizador }}</h2>
        <ul>
            <li>Localizador: {{ $reserva->localizador }}</li>
            <li>Cliente: {{ $reserva->email_cliente }}</li>
            <li>fecha_entrada: {{ $reserva->fecha_entrada }}</li>
            <li>Hora de entrada: {{ $reserva->hora_entrada }}</li>
            <li>Nº de vuelo entrada: {{ $reserva->numero_vuelo_entrada }}</li>
            <li>Origen vuelo: {{ $reserva->origen_vuelo_entrada }}</li>
            <li>Fecha de salida: {{ $reserva->fecha_vuelo_salida }}</li>
            <li>Hora de recogida: {{ $reserva->hora_recogida }}</li>
            <li>Numero de viajeros: {{ $reserva->num_viajeros }}</li>
            <li>Destino: {{ $reserva->id_destino }}</li>
            <li>Vehículo: {{ $reserva->id_vehiculo }}</li>
            <!-- Agrega más campos según tu necesidad -->
        </ul>
        @endif
    </div>
    <div>
        <form action="{{ route('mostrarReservas') }}" method="GET">
            <button type="submit" class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-500 transition-colors duration-300 shadow-md">
                Ver todas las reservas
            </button>
        </form>
    </div>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-6">
    <h1 class="text-xl font-bold mb-4">Listado de Reservas</h1>

    @if (isset($reservas) && count($reservas) > 0)
        <table class="table-auto w-full border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Localizador</th>
                    <th class="border px-4 py-2">Email Cliente</th>
                    <th class="border px-4 py-2">Fecha Entrada</th>
                    <th class="border px-4 py-2">Destino</th>
                    <th class="border px-4 py-2">Vehículo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td class="border px-4 py-2">{{ $reserva->localizador }}</td>
                        <td class="border px-4 py-2">{{ $reserva->email_cliente }}</td>
                        <td class="border px-4 py-2">{{ $reserva->fecha_entrada }}</td>
                        <td class="border px-4 py-2">{{ $reserva->id_destino }}</td>
                        <td class="border px-4 py-2">{{ $reserva->id_vehiculo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay reservas disponibles.</p>
    @endif
</div>


    </div>

       
    

</body>

</html>