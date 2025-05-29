<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>ISLA TRANSFERS funcionadno </title>
    @vite('resources/css/app.css')
</head>
<body class="bg-blue-50 min-h-screen flex flex-col">
    <!-- Barra de navegación mejorada -->
    <nav class="w-full bg-gradient-to-r from-blue-800 via-blue-700 to-blue-600 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo/Texto principal -->
                <div class="flex items-center">
                    <h1 class="text-3xl font-bold text-blue-800 dark:text-blue-600 mr-4">
                        ISLA TRANSFERS
                    </h1>
                </div>
                
                <!-- Menú de navegación -->
                <div class="flex justify-end space-y-4 flex space-x-4">
                    <a href="#explore" class="px-4 py-2 text-blue-100 hover:text-white transition-colors duration-300">
                        Explorar
                    </a>
                    <span class="border-l border-blue-500 my-2"></span>
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-500 transition-colors duration-300 shadow-md">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-green-600 rounded-lg hover:bg-green-500 transition-colors duration-300 shadow-md">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal centrado -->
    <main class="flex-grow flex flex-col items-center justify-center py-20 px-4">
        <div class="max-w-4xl text-center">
            <h2 class="text-5xl font-extrabold text-blue-800 mb-6 animate-fade-in">
                Bienvenido a ISLA TRANSFERS
            </h2>
            <p class="text-xl text-blue-700 mb-8 max-w-2xl mx-auto">
                Disfruta de la calidad, confianza y confort en cada viaje.
            </p>
            
            <!-- Imagen con efecto hover -->
            <div class="relative group">
                <img src="https://img.freepik.com/vector-gratis/fondo-vacaciones-dias-festivos-maleta-globo-realista-camara-fotos_1284-10476.jpg" 
                     alt="Bienvenido a Isla Transfers" 
                     class="rounded-xl shadow-2xl transform group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-blue-900 opacity-0 group-hover:opacity-10 rounded-xl transition-opacity duration-500"></div>
            </div>
        </div>
    </main>
</body>

</html>