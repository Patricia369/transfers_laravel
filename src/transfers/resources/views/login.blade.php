<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-gray-800 via-gray-900 to-black">
    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Bienvenido Transfers</h1>
            <p class="text-gray-500">Inicia sesión en tu cuenta</p>
        </div>

        <form action="/Transfers/app/appController.php?controller=viajero&action=loginViajero" method="POST" id="loginForm">
            <input type="hidden" name="action" value="loginViajero">

            {{-- Mensaje de error --}}
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <div class="mb-4">
                <label for="userlogin" class="block text-sm font-medium text-gray-700">Ingresa tu usuario</label>
                <input type="text" id="userlogin" name="email" placeholder="example@gmail.com"
                    class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    minlength="10" maxlength="20" required>
            </div>
            <div class="mb-6">
                <label for="passlogin" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="passlogin" name="password" placeholder="Contraseña"
                    class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    minlength="5" maxlength="10" required>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-500 transition duration-300 shadow">
                Iniciar sesión
            </button>

            <div class="text-center mt-4 text-sm">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="px-4 py-2 bg-green-600 rounded-lg hover:bg-green-500 transition-colors duration-300 shadow-md">
                        Register
                    </a>
            </div>
        </form>
    </div>
</body>
