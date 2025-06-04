<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Transfers</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen  items-center justify-center bg-gradient-to-r from-gray-800 via-gray-900 to-black p-4">

    <div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Formulario de Reserva</h1>

        <form action="{{ url('/crearReserva') }}" method="POST" id="reservaForm" class="space-y-6">
            @csrf <!-- Laravel token -->

            <input type="hidden" name="action" value="crearReserva">

            <div>
                <label class="block text-lg font-medium text-gray-700 mb-2">Reserva para nuestros clientes</label>
                <div class="flex items-center gap-6">
                    <label class="inline-flex items-center">
                        <input type="radio" name="id_tipo_reserva" value="1" checked class="text-blue-600">
                        <span class="ml-2">Particular</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="id_tipo_reserva" value="2" class="text-blue-600">
                        <span class="ml-2">Empresa</span>
                    </label>
                </div>
                <p id="errorTipoReserva" class="text-sm text-red-500 mt-1"></p>
            </div>

            <div>
                <label for="tipoTrayecto" class="block text-sm font-medium text-gray-700">Seleccionar Trayecto</label>
                <select id="tipoTrayecto" name="id_destino" onchange="elegirTrayecto()" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Seleccione una opción</option>
                    <option value="1">Aereopuerto a Hotel</option>
                    <option value="2">Hotel a Aeropuerto</option>
                    <option value="3">Ida y Vuelta</option>
                </select>
                <p id="errorTrayecto" class="text-sm text-red-500 mt-1"></p>
            </div>

            <h2 class="text-xl font-semibold text-gray-800 mt-6">DETALLES DE LA RESERVA</h2>

            <!-- Trayecto: Aeropuerto a Hotel -->
            <div id="aeropuertoHotel" class="space-y-4 hidden">
                <h3 class="text-lg font-medium">Trayecto: Aeropuerto a Hotel</h3>
                <div>
                    <label for="diaLlegada" class="block">Día de Llegada</label>
                    <input type="date" id="diaLlegada" name="fecha_entrada" class="mt-1 w-full rounded-md border-gray-300">
                </div>
                <div>
                    <label for="horaLlegada" class="block">Hora de Llegada</label>
                    <input type="time" id="horaLlegada" name="hora_entrada" class="mt-1 w-full rounded-md border-gray-300">
                    <p id="errorDiaLlegada" class="text-sm text-red-500 mt-1"></p>
                </div>
                <div>
                    <label for="numVueloLlegada" class="block">Número del Vuelo</label>
                    <input type="text" id="numVueloLlegada" name="numero_vuelo_entrada" minlength="4" maxlength="10" class="mt-1 w-full rounded-md border-gray-300">
                    <p id="errVueLlegada" class="text-sm text-red-500 mt-1"></p>
                </div>
                <div>
                    <label for="aeropuertOrigen" class="block">Aeropuerto de Origen</label>
                    <input type="text" id="aeropuertOrigen" name="origen_vuelo_entrada" minlength="5" maxlength="15" class="mt-1 w-full rounded-md border-gray-300">
                    <p id="errOrigenVuelo" class="text-sm text-red-500 mt-1"></p>
                </div>
            </div>

            <!-- Trayecto: Hotel a Aeropuerto -->
            <div id="HotelAereopuerto" class="space-y-4 hidden">
                <h3 class="text-lg font-medium">Trayecto: Hotel a Aeropuerto</h3>
                <div>
                    <label for="hotelSalida" class="block">Día del Vuelo</label>
                    <input type="date" id="hotelSalida" name="fecha_vuelo_salida" class="mt-1 w-full rounded-md border-gray-300">
                </div>
                <div>
                    <label for="horaSalida" class="block">Hora del Vuelo</label>
                    <input type="time" id="horaSalida" name="hora_vuelo_salida" class="mt-1 w-full rounded-md border-gray-300">
                    <p id="errDiaSalida" class="text-sm text-red-500 mt-1"></p>
                </div>
                <div>
                    <label for="numeroVuelo" class="block">Número de Vuelo</label>
                    <input type="text" id="numeroVuelo" name="numero_vuelo_salida" placeholder="AB1234" minlength="4" maxlength="10" class="mt-1 w-full rounded-md border-gray-300">
                    <p id="errNumVuelo" class="text-sm text-red-500 mt-1"></p>
                </div>
                <div>
                    <label for="horaRecogida" class="block">Hora de Recogida</label>
                    <input type="time" id="horaRecogida" name="hora_recogida" class="mt-1 w-full rounded-md border-gray-300">
                    <p id="errRecogida" class="text-sm text-red-500 mt-1"></p>
                </div>
            </div>

            <!-- Hotel, número de viajeros, vehículo, email -->
            <div>
                <label for="idHotel" class="block">Hotel de Destino/Recogida</label>
                <select id="idHotel" name="id_hotel" required class="mt-1 w-full rounded-md border-gray-300">
                    <option value="">Seleccione un hotel</option>
                    <option value="1">Hotel Sunset</option>
                    <option value="2">Hotel Verano</option>
                </select>
                <p id="errorHotel" class="text-sm text-red-500 mt-1"></p>
            </div>

            <div>
                <label for="numViajeros" class="block">Número de Viajeros</label>
                <input type="number" id="numViajeros" name="num_viajeros" min="1" required class="mt-1 w-full rounded-md border-gray-300">
                <p id="errNumViajero" class="text-sm text-red-500 mt-1"></p>
            </div>

            <div>
                <label for="vehiculo" class="block">Selecciona un Vehículo</label>
                <select id="vehiculo" name="id_vehiculo" required class="mt-1 w-full rounded-md border-gray-300">
                    <option value="">Seleccione una opción</option>
                    <option value="1">Deportivo</option>
                    <option value="2">Turismo</option>
                    <option value="3">Familiar</option>
                </select>
                <p id="errorVehiculo" class="text-sm text-red-500 mt-1"></p>
            </div>

            <div>
                <label for="emailReserva" class="block">Email</label>
                <input type="email" id="emailReserva" name="email_cliente" required class="mt-1 w-full rounded-md border-gray-300">
                <p id="errorEmail" class="text-sm text-red-500 mt-1"></p>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow">
                    Realizar Reserva
                </button>
            </div>
        </form>
    </div>

    <script>
        function valTipoReserva() {
            let tipoReserva = document.querySelector("[name=id_tipo_reserva]").checked;
            let errorTipoReserva = document.getElementById('errorTipoReserva');
            errorTipoReserva.textContent = '';
            if (!tipoReserva) {
                errorTipoReserva.textContent = "Debe seleccionar un tipo de reserva.";
                return false;
            }
        }

        function elegirTrayecto() {
            var trayecto = document.getElementById("tipoTrayecto").value;
            var salidaHotel = document.getElementById("HotelAereopuerto");
            var llegadaAhotel = document.getElementById("aeropuertoHotel");
            var error = document.getElementById('errorTrayecto');
            error.textContent = '';
            llegadaAhotel.style.display = "none";
            salidaHotel.style.display = "none";

            switch (trayecto) {
                case '1':
                    llegadaAhotel.style.display = "block";
                    break;
                case '2':
                    salidaHotel.style.display = "block";
                    break;
                case '3':
                    console.log("ida y vuelta");
                    llegadaAhotel.style.display = "block";
                    salidaHotel.style.display = "block";

                    break;
                default:
                    error.textContent = 'Se debe seleccionar un trayecto.';
                    break;
            }
            return trayecto;
        }
        //validar fecha Salida del hotel
        function fechaHotelSalida() {
            let fechaActual = new Date();
            var fechaSalida = document.getElementById("hotelSalida").value;
            var horaSalida = document.getElementById("horaSalida").value;
            let errorfecha = document.getElementById('errDiaSalida');
            errorfecha.textContent = '';
            if (!fechaSalida || !horaSalida) {
                errorfecha.textContent = "Debes seleccionar una fecha y una hora.";
                return false;
            }
            let [year, month, day] = fechaSalida.split("-").map(Number);
            let [hour, minute] = horaSalida.split(":").map(Number);
            let fechaYhora = new Date(year, month - 1, day, hour, minute);
            if (fechaYhora <= fechaActual) {
                console.log(fechaYhora + fechaActual);
                errorfecha.textContent = "La fecha y hora no pueden ser anteriores a la fecha y hora actual.";
                return false;
            }
            return true;
        } //hago cambio de nombre de la funcion para probar el paso por parametro
        function vueloLlegada() { //validarNumVuelos() nombre antes
            //  console.log("dentro de validad numero de vuelo");
            var numVuelos = document.getElementById('numVueloLlegada').value;
            let errorVuelo = document.getElementById('errNumVuelo');
            console.log("el numero de vuelo es: " + numVuelos);
            // alert("el numero de vuelo es: "+ numVuelos);
            let regexVuelo = /^[A-Za-z]{2,4}\d+$/;
            errorVuelo.textContent = '';
            if (!numVuelos || numVuelos.trim() === "") {
                errorVuelo.textContent = "Debe ingresar un número de vuelo.";
                return false;
            }
            if (numVuelos.length < 4 || numVuelos.length > 10) {
                console.log(numVuelos.length);
                errorVuelo.textContent = "El número de vuelo debe tener entre 4 y 10 caracteres.";
                return false;
            }
            if (!regexVuelo.test(numVuelos)) {
                errorVuelo.textContent = "El número de vuelo no es válido. Debe iniciar con letras, seguido de números.";
                return false;
            }
            return true;
        }

        function validarVueloSalida() { //num de vuelo salida 
            var numVuelos = document.getElementById('numeroVuelo').value;
            let errorVuelo = document.getElementById('errNumVuelo');
            let regexVuelo = /^[A-Za-z]{2,4}\d+$/;
            // alert("el numero de vuelo es: "+ numVuelos);
            errorVuelo.textContent = '';
            if (!numVuelos || numVuelos.trim() === "") {
                errorVuelo.textContent = "Debe ingresar un número de vuelo.";
                return false;
            }
            if (numVuelos.length < 4 || numVuelos.length > 10) {
                console.log(numVuelos.length);
                errorVuelo.textContent = "El número de vuelo debe tener entre 4 y 10 caracteres.";
                return false;
            }
            if (!regexVuelo.test(numVuelos)) {
                errorVuelo.textContent = "El número de vuelo no es válido. Debe iniciar con letras, seguido de números.";
                return false;
            }
            return true;
        }

        function validarRecogida() {
            let fechoraVuelo = document.getElementById("hotelSalida").value;
            var horaVuelo = document.getElementById("horaSalida").value;
            let horaRecogida = document.getElementById("horaRecogida").value;
            let errorRecogida = document.getElementById('errRecogida');
            errorRecogida.textContent = '';

            let [year, month, day] = fechoraVuelo.split("-").map(Number);
            let [hour, minute] = horaVuelo.split(":").map(Number);
            let fechYHoraVuelo = new Date(year, month - 1, day, hour, minute);
            let [hourRecogida, minuteRecogida] = horaRecogida.split(":").map(Number);
            let fecHoraRecogida = new Date(year, month - 1, day, hourRecogida, minuteRecogida);
            let difMilisegundos = fechYHoraVuelo - fecHoraRecogida;

            if (difMilisegundos < 0) {
                errorRecogida.textContent = "La hora de recogida no puede ser superior a la hora de vuelo.";
                return false;
            } else if (difMilisegundos > 0 && difMilisegundos < 1000 * 60 * 60) {
                errorRecogida.textContent = "La hora de recogida no puede ser inferior a una hora antes del vuelo.";
                return false;
            } else {

                let horas = Math.floor((difMilisegundos % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                // console.log('la deferencia es:', horas + " horas");
                return true;
            }
        }

        function validarDestino() {
            var destino = document.getElementById("idHotel").value;
            var errorDestino = document.getElementById('errorHotel');
            errorDestino.textContent = '';
            if (!destino) {
                errorDestino.textContent = "Debe seleccionar un hotel.";
                return false;
            } else {
                return true;
            }
        }

        function validarNumViajeros() {
            var numViajeros = document.getElementById("numViajeros").value;
            var errorNumViajeros = document.getElementById('errNumViajero');
            errorNumViajeros.textContent = '';
            if (!numViajeros) {
                errorNumViajeros.textContent = "Debe ingresar el número de viajeros.";
                return false;
            }
            if (numViajeros < 1 || numViajeros > 5) {
                errorNumViajeros.textContent = "El número de viajeros debe estar entre 1 y 5.";
                return false;
            }
            return true;
        }
        //validar vehiculo 
        function validarVehiculo() {
            let vehiculo = document.getElementById("vehiculo").value;
            let errorVehiculo = document.getElementById('errorVehiculo');
            errorVehiculo.textContent = '';
            if (!vehiculo) {
                errorVehiculo.textContent = "Debe seleccionar un vehículo.";
                return false;
            } else {
                console.log("vehiculo elegido", vehiculo);
                return true;
            }

        }

        function validarEmailViajero() {
            var email = document.getElementById("emailReserva").value;
            let errorEmail = document.getElementById("errorEmail");
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            errorEmail.textContent = "";
            if (!email.trim()) {
                errorEmail.textContent = "Debe ingresar un email.";
                return false;
            }
            if (!emailRegex.test(email)) {
                errorEmail.textContent = "El email no es válido.";
                return false;
            }
            if (email.length < 12 || email.length > 20) {
                errorEmail.textContent = "Email no válido, máximo 20 carácteres.";
                return false;
            }
            return true;
        }

        function validFormSalidaHotel() {
            trayecto = elegirTrayecto();
            var valSalidaHotel = [fechaHotelSalida(), validarVueloSalida(), validarRecogida(), validarDestino(),
                validarNumViajeros(), validarEmailViajero()
            ];
            // console.log("validando salida hotel" , valSalidaHotel);
            // alert("validando salida hotel" + validarVueloSalida());

            if (valSalidaHotel.some(valor => valor == false)) {
                console.log("Error validacion salida", valSalidaHotel);
                return false;
            } else {
                console.log("Todo correcto", valSalidaHotel);
                return true;
            }
        }
        //validaciones de Aeropuerto a hotel
        function validarFechaLegada() {
            let fechaActual = new Date();
            let fechaLlegada = document.getElementById("diaLlegada").value;
            let horaLlegada = document.getElementById("horaLlegada").value;
            let errorLlegada = document.getElementById('errorDiaLlegada');
            errorLlegada.textContent = '';
            if (!fechaLlegada || !horaLlegada) {
                errorLlegada.textContent = "Debes seleccionar una fecha y una hora.";
                return false;
            }
            let [year, month, day] = fechaLlegada.split("-").map(Number);
            let [hour, minute] = horaLlegada.split(":").map(Number);
            let fechaYhora = new Date(year, month - 1, day, hour, minute);
            if (fechaYhora <= fechaActual) {
                // console.log(fechaYhora + fechaActual);
                errorLlegada.textContent = "La fecha y hora no pueden ser anteriores a la fecha y hora actual.";
                return false;
            }
        }

        function validarOrigenVuelo() {
            let origen = document.getElementById("aeropuertOrigen").value;
            let errorOrigen = document.getElementById('errOrigenVuelo');
            let regexOrigen = /^(?=(?:[^ ]* ){0,5}[^ ]*$)[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ ]{5,15}$/;
            errorOrigen.textContent = '';
            if (!origen || origen.trim() === "") {
                errorOrigen.textContent = "Debe ingresar el origen del vuelo.";
                return false;
            }
            if (!regexOrigen.test(origen)) {
                errorOrigen.textContent = "Origen de vuelo no válido. No ingresar números o caracteres especiales.";
                return false;
            }
            return true;
        }

        function validarFormLLegadaHotel() {
            //  let trayecto =  elegirTrayecto();
            // let vueloLlegada = vueloLlegada();
            //let numVueloEntrada = document.getElementsByName("numero_vuelo_entrada")[0].value;
            //console.log("EL NUMERO DE VUELO ENTRADA ES: "+numVueloEntrada);

            //console.log("dentro de llegada hotel");

            let llegadaAhotel = [validarFechaLegada(), vueloLlegada(), validarOrigenVuelo(),
                validarDestino(), validarNumViajeros(), validarEmailViajero()
            ];
            console.log("validando llegada hotel", llegadaAhotel);
            console.log(" numero de vuelo llegada" + vueloLlegada);
            console.log("hora de llegada", validarFechaLegada());


            if (llegadaAhotel.some(valor => valor == false)) {
                console.log("Validación incorrecta  ", llegadaAhotel);
                return false;
            } else {
                console.log("Validación correcta", llegadaAhotel);

                return true;
            }
        }

        function validarFormReserva() {
            valTipoReserva();
            validarVehiculo();
            let trayecto = elegirTrayecto();
            let llegadaHotel = validarFormLLegadaHotel();
            let salidaHotel = validFormSalidaHotel();

            //console.log("Trayecto elegido reserva: " + trayecto);
            if (trayecto == 1) {
                if (llegadaHotel == true) {
                    console.log("Todo correcto en llegada hotel", llegadaHotel);
                    return true;
                } else {
                    console.log("validacion incorrecta", llegadaHotel);
                    return false;
                }
            } else if (trayecto == 2) {
                if (salidaHotel == true) {
                    console.log("Todo correcto en salida hotel", salidaHotel);
                    return true;
                } else {
                    console.log("validacion incorrecta", salidaHotel);
                    return false;
                }
            }
            if (trayecto == 3) {
                if (llegadaHotel == true && salidaHotel == true) {
                    console.log("Todo true en ida y vuelta", salidaHotel, llegadaHotel);
                    return true;
                } else {
                    console.log("validacion incorrecta", salidaHotel, llegadaHotel);
                    return false;
                }
            }
        }
        window.addEventListener("DOMContentLoaded", function() {
            var formCompleto = document.getElementById("reservaForm");
            formCompleto.addEventListener("submit", function(event) {
                console.log(validarFormReserva());
                if (validarFormReserva() == false) {
                    console.log("Error en la validación " + formCompleto);
                    console.log("Error en la validación " + event);

                    event.preventDefault();
                } else {
                    // alert("Formulario enviado correctamente.");
                    console.log("Formulario enviado correctamente.");
                    console.log(validarFormReserva());
                }
            });
        });
    </script>


</body>

</html>