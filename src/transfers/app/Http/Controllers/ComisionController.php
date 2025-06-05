<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viajero;
use App\Models\Reserva;

class ComisionController extends Controller
{
    public function calcularComision($id_hotel)
{
    $hotel = Reserva::find($id_hotel);

    if (!$hotel) {
        return redirect()->back()->with('error', 'Hotel no encontrado.');
    }

    // Porcentaje de comisión por hotel (ej. 0.07 para 7%)
    $porcentajeComision = $hotel->comision ?? 0.05; // Valor por defecto si no está definido

    // Obtener reservas del hotel (puedes añadir filtros como fecha, tipo_reserva, etc.)
    $reservas = Reserva::where('id_hotel', $id_hotel)
                ->where('id_tipo_reserva', 1) // solo si aplicas filtro por tipo
                ->get();
    $totalComisiones = 0;
    $comisiones = [];

    foreach ($reservas as $reserva) {
        $comision = $reserva->precio * $porcentajeComision;

        $comisiones[] = [
            'reserva_id' => $reserva->id,
            'fecha' => $reserva->fecha,
            'precio' => $reserva->precio,
            'comision' => $comision,
        ];

        $totalComisiones += $comision;
    }
    // Retornar a vista 
    return view('comision', [
        'hotel' => $hotel,
        'comisiones' => $comisiones,
        'totalComisiones' => $totalComisiones,
        'porcentaje' => $porcentajeComision * 100,
    ]);

}
    

}
