<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reserva;

class ReservaController extends Controller
{
    public function crearReserva(Request $request)
    {
        // Validación inicial general
        $request->validate([
            'id_destino' => 'required|integer',
            'id_tipo_reserva' => 'required|integer',
            'email_cliente' => 'required|email',
            'id_hotel' => 'required|integer',
            'num_viajeros' => 'required|integer',
            'id_vehiculo' => 'required|integer',
        ]);

        $trayecto = $request->input('id_destino'); // 1 = solo entrada, 2 = solo salida, 3 = ambos
        $errores = [];
        $data = [];

        // Validar campos por tipo de trayecto
        if ($trayecto == 1 || $trayecto == 3) {
            $request->validate([
                'fecha_entrada' => 'required|date',
                'hora_entrada' => 'required',
                'numero_vuelo_entrada' => 'required',
                'origen_vuelo_entrada' => 'required',
            ]);
        }

        if ($trayecto == 2 || $trayecto == 3) {
            $request->validate([
                'fecha_vuelo_salida' => 'required|date',
                'hora_vuelo_salida' => 'required',
                'numero_vuelo_salida' => 'required',
                'hora_recogida' => 'required',
            ]);
        }

        // Construir los datos de la reserva
        $data = [
            'id_tipo_reserva' => $request->input('id_tipo_reserva'),
            'id_destino' => $trayecto,
            'fecha_entrada' => $request->input('fecha_entrada'),
            'hora_entrada' => $request->input('hora_entrada'),
            'numero_vuelo_entrada' => $request->input('numero_vuelo_entrada'),
            'origen_vuelo_entrada' => $request->input('origen_vuelo_entrada'),
            'fecha_vuelo_salida' => $request->input('fecha_vuelo_salida'),
            'hora_vuelo_salida' => $request->input('fecha_vuelo_salida') && $request->input('hora_vuelo_salida')
                ? $request->input('fecha_vuelo_salida') . ' ' . $request->input('hora_vuelo_salida') . ':00'
                : null,
            'numero_vuelo_salida' => $request->input('numero_vuelo_salida'),
            'hora_recogida' => $request->input('fecha_vuelo_salida') && $request->input('hora_recogida')
                ? $request->input('fecha_vuelo_salida') . ' ' . $request->input('hora_recogida') . ':00'
                : null,
            'id_hotel' => $request->input('id_hotel'),
            'num_viajeros' => $request->input('num_viajeros'),
            'id_vehiculo' => $request->input('id_vehiculo'),
            'email_cliente' => $request->input('email_cliente'),
            'fecha_reserva' => now(),
            'fecha_modificacion' => now(),
        ];

        // Guardar la reserva usando Eloquent
        Reserva::create($data);

        // Redirigir al panel o dashboard con mensaje
        return redirect()->route('dashboard')->with('success', 'Reserva creada correctamente.');
    }
    public function mostrarReservas()
    {
        $reservas = Reserva::all();
        return view('dashboard', ['reservas' => $reservas]);
    }

    public function mostrarPorLocalizador(Request $request)
    {
        $localizador = $request->input('localizador'); // o $request->get('localizador')

        $reserva = Reserva::buscarReservaPorLocalizador($localizador);

        if (!$reserva) {
            return redirect()->back()->with('error', 'No se encontró ninguna reserva con ese localizador.');
        }

        // Pasar siempre 'reservas' como colección al dashboard
        return view('dashboard', ['reservas' => collect([$reserva])]);
    }
}
