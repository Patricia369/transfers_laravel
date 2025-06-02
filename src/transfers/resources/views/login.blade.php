<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Transfers</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen  items-center justify-center bg-gradient-to-r from-gray-800 via-gray-900 to-black p-4">

    <div class="bg-white p-8 rounded-xl shadow-xl w-1/2 max-w-screen-md"> <!-- Responsive -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Bienvenido a Transfers</h1>
            <p class="text-gray-600 mt-2">Inicia sesión en tu cuenta</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
                <p>{{ session('error') }}</p>
            </div>
            @endif

            <!-- Campo de usuario -->
            <div>
                <label for="userlogin" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                <input type="email" id="userlogin" name="email" placeholder="example@gmail.com"
                    class=" max-w-screen-md px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    minlength="10" maxlength="50" required>
            </div>

            <!-- Campo de contraseña -->
            <div>
                <label for="passlogin" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <input type="password" id="passlogin" name="password" placeholder="••••••"
                    class="max-w-screen-md px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    minlength="5" maxlength="20" required>
            </div>

            <!-- Botón de login -->
            <div class="flex justify-center">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-medium shadow">
                    Iniciar sesión
                </button>
            </div>

            <!-- Registro -->
            <div class="text-center text-sm text-gray-600 mt-4">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}"
                   class="text-blue-500 hover:text-blue-700 font-medium">
                    Regístrate aquí
                </a>
            </div>
        </form>
    </div>

</body>
</html>
