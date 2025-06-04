<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Transfers</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-r from-gray-800 via-gray-900 to-black p-4">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Usuarios Registrados</h1>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if($viajeros->isEmpty())
        <p class="text-gray-600">No hay viajeros registrados.</p>
        @else
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Apellido 1</th>
                    <th class="py-2 px-4 border-b">Apellido 2</th>
                    <th class="py-2 px-4 border-b">Dirección</th>
                    <th class="py-2 px-4 border-b">Código Postal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viajeros as $viajero)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $viajero->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $viajero->nombre }}</td>
                    <td class="py-2 px-4 border-b">{{ $viajero->apellido1 }}</td>
                    <td class="py-2 px-4 border-b">{{ $viajero->apellido2 }}</td>
                    <td class="py-2 px-4 border-b">{{ $viajero->direccion }}</td>
                    <td class="py-2 px-4 border-b">{{ $viajero->codigoPostal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <!-- Botón para volver al dashboard -->
    <div class="mt-6 text-center">
        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-500 transition-colors duration-300 shadow-md">
            Regresar a panel de control
        </a>
