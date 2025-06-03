<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    public $timestamps = false; // Desactiva los timestamps si no los necesitas
    protected $table = 'transfer_reservas';
    protected $fillable = [
        'id_reserva',
        'localizador',
        'id_hotel',
        'id_tipo_reserva',
        'email_cliente',
        'fecha_reserva',
        'fecha_modificacion',
        'id_destino',
        'fecha_entrada',
        'hora_entrada',
        'numero_vuelo_entrada',
        'origen_vuelo_entrada',
        'fecha_vuelo_salida',
        'hora_vuelo_salida',
        'numero_vuelo_salida',
        'hora_recogida',
        'num_viajeros',
        'id_vehiculo',

    ];
    //Crea el lozalizador antes de insertar la reserva bbdd
    protected static function booted()
    {
        static::creating(function ($reserva) {
            do {
                $localizador = strtoupper(uniqid('LOC'));
            } while (self::where('localizador', $localizador)->exists());

            $reserva->localizador = $localizador;
        });
    }


    public function crearReserva($reserva, $localizador)
    {

        $sql = "INSERT INTO transfer_reservas (localizador,id_hotel, id_tipo_reserva, email_cliente, fecha_reserva, fecha_modificacion, 
                        id_destino, fecha_entrada, hora_entrada, numero_vuelo_entrada, origen_vuelo_entrada, 
                        hora_vuelo_salida, fecha_vuelo_salida, num_viajeros, id_vehiculo, hora_recogida, numero_vuelo_salida) 
                        VALUES (:localizador, :id_hotel, :id_tipo_reserva, :email_cliente, :fecha_reserva, :fecha_modificacion,
                        :id_destino, :fecha_entrada, :hora_entrada, :numero_vuelo_entrada, :origen_vuelo_entrada,
                        :hora_vuelo_salida, :fecha_vuelo_salida, :num_viajeros, :id_vehiculo, :hora_recogida, :numero_vuelo_salida)";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':localizador' => $localizador,
                ':id_hotel' => $reserva['id_hotel'],
                ':id_tipo_reserva' => $reserva['id_tipo_reserva'],
                ':email_cliente' => $reserva['email_cliente'],
                ':fecha_reserva' => $reserva['fecha_reserva'] ?? null,
                ':fecha_modificacion' => $reserva['fecha_modificacion'] ?? null,
                ':id_destino' => $reserva['id_destino'],
                ':fecha_entrada' => $reserva['fecha_entrada'] ?? null,
                ':hora_entrada' => $reserva['hora_entrada'] ?? null,
                ':numero_vuelo_entrada' => $reserva['numero_vuelo_entrada'] ?? null,
                ':origen_vuelo_entrada' => $reserva['origen_vuelo_entrada'] ?? null,
                ':hora_vuelo_salida' => $reserva['hora_vuelo_salida'] ?? null,
                ':fecha_vuelo_salida' => $reserva['fecha_vuelo_salida'] ?? null,
                ':num_viajeros' => $reserva['num_viajeros'],
                ':id_vehiculo' => $reserva['id_vehiculo'] ?? null,
                ':hora_recogida' => $reserva['hora_recogida'] ?? null,
                ':numero_vuelo_salida' => $reserva['numero_vuelo_salida'] ?? null
            ]);
        } catch (\PDOException $error) {
            echo $error->getMessage();
            echo "<pre> Error al crear la reserva: " . $error->getMessage();
        }
        //$this->mostrarReserva($localizador);

        return $reserva;
    }
    public static function buscarReservaPorLocalizador($localizador)
    {
        return self::where('localizador', $localizador)->first();
    }
    public static function mostrarReservas()
    {
        return self::all();
    }
    public static function mostrarReservasXEmail($email)
    {
        return self::where('email_cliente', $email)->get();
    }

}
