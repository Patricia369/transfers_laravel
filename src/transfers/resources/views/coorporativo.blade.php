<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coorporativo Transfers</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen  items-center justify-center bg-gradient-to-r from-gray-800 via-gray-900 to-black p-4">
    @if(session('error'))
    <p class="text-red-500">{{ session('error') }}</p>
    @endif

    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Panel Coorporativo</h1>
         <form action="{{ route('reservaXlocalizador') }}" method="POST" id="reservaForm" class="space-y-6">
            @csrf
            <div class="flex justify-end space-y-4 flex space-x-4">
                <span class="border-l border-blue-500 my-2"></span>
                <a href="{{ route('reserva') }}" class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-500 transition-colors duration-300 shadow-md">
                    Hacer Reserva
                </a>
               
            </div>
         </form>
    </div>



    

</body>
