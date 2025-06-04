<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Registro Usuario</title>
  @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gradient-to-r from-gray-800 via-gray-900 to-black flex items-center justify-center p-4">
  <form action="{{ url('/crearViajero') }}" id="formRegister" method="POST" class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-xl space-y-6">
    @csrf <!-- Laravel token -->
    <input type="hidden" name="action" value="crearViajero">

    <h1 class="text-3xl font-bold text-center text-gray-800">Registro de Usuario</h1>

    <!-- Nombre -->
    <div>
      <label for="nombre" class="block font-medium text-gray-700">Nombre</label>
      <input type="text" id="nombre" name="nombre" placeholder="Nombre"
        minlength="3" maxlength="15" required
        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <span id="errorNombre" class="text-red-600 text-sm"></span>
    </div>

    <!-- Apellido 1 -->
    <div>
      <label for="apellido1" class="block font-medium text-gray-700">Primer Apellido</label>
      <input type="text" id="apellido1" name="apellido1" placeholder="Apellido"
        minlength="3" maxlength="15" required
        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <span id="errorApellido1" class="text-red-600 text-sm"></span>
    </div>

    <!-- Apellido 2 -->
    <div>
      <label for="apellido2" class="block font-medium text-gray-700">Segundo Apellido</label>
      <input type="text" id="apellido2" name="apellido2" placeholder="Apellido"
        minlength="3" maxlength="15" required
        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <span id="errorApellido2" class="text-red-600 text-sm"></span>
    </div>

    <!-- Dirección -->
    <div>
      <label for="direccion" class="block font-medium text-gray-700">Dirección</label>
      <input type="text" id="direccion" name="direccion" placeholder="Domicilio"
        minlength="5" maxlength="30" required
        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <span id="errorDireccion" class="text-red-600 text-sm"></span>
    </div>

    <!-- Código Postal -->
    <div>
      <label for="codPostal" class="block font-medium text-gray-700">Código Postal</label>
      <input type="text" id="codPostal" name="codigoPostal" placeholder="25400"
        minlength="4" maxlength="5"
        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <span id="errorcodPostal" class="text-red-600 text-sm"></span>
    </div>

    <!-- Ciudad -->
    <div>
      <label for="ciudad" class="block font-medium text-gray-700">Ciudad</label>
      <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad"
        minlength="4" maxlength="18"
        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <span id="errorCiudad" class="text-red-600 text-sm"></span>
    </div>

    <!-- País -->
    <div>
      <label for="pais" class="block font-medium text-gray-700">País</label>
      <input type="text" id="pais" name="pais" placeholder="País"
        minlength="4" maxlength="15"
        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <span id="errorPais" class="text-red-600 text-sm"></span>
    </div>

    <!-- Email -->
    <div>
      <label for="email" class="block font-medium text-gray-700">Email</label>
      <input type="email" id="email" name="email" placeholder="example@gmail.com"
        minlength="10" maxlength="50" required
        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <span id="errorEmail" class="text-red-600 text-sm"></span>
    </div>

    <!-- Contraseña -->
    <div>
      <label for="password" class="block font-medium text-gray-700">Contraseña</label>
      <input type="password" id="password" name="password" placeholder="Contraseña"
        minlength="5" maxlength="20" required
        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      <span id="errorPassword" class="text-red-600 text-sm"></span>
    </div>
    <!-- Confirmar Contraseña -->
<div>
  <label for="password_confirmation" class="block font-medium text-gray-700">Confirmar Contraseña</label>
  <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña"
    required minlength="5" maxlength="20"
    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
</div>
      <!-- Botones -->
    <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0 justify-center items-center pt-4">
      <button type="submit"
        class="w-full sm:w-auto bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300 font-medium shadow">
        Registrar
      </button>
      <button type="reset"
        class="w-full sm:w-auto bg-gray-700 text-gray-800 py-2 px-6 rounded-lg hover:bg-gray-400 transition duration-300">
        Limpiar
      </button>
      <p class="text-gray-600 text-sm">
        ¿Ya tienes una cuenta? </p>
      <a href="{{ route('login') }}"
        class="w-full sm:w-auto text-blue-500 hover:text-blue-700 font-medium text-center">
        Login
      </a>