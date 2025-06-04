<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viajero extends Model
{
    use HasFactory;
    //nombre de la tabla en bbdd
    public $timestamps = false; // Desactiva los timestamps si no los necesitas
    protected $table = 'transfer_viajeros';
    //campos que se pueden rellenar
    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'direccion',
        'codigoPostal',
        'ciudad',
        'pais',
        'email',
        'password',
    ];

    // Métodos CRUD
    public function crearViajero($viajero)
    {
        Viajero::create([
            'nombre' => $viajero['nombre'],
            'apellido1' => $viajero['apellido1'],
            'apellido2' => $viajero['apellido2'],
            'direccion' => $viajero['direccion'],
            'codigoPostal' => $viajero['codigoPostal'],
            'ciudad' => $viajero['ciudad'],
            'pais' => $viajero['pais'],
            'email' => $viajero['email'],
            'password' => bcrypt($viajero['password']), // Encriptar la contraseña
        ]);
    }
    public function read($id)
    {
        $sql = "SELECT * FROM viajeros WHERE id_viajero = :id_viajero";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id_viajero' => $id]);
        $viajero = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($viajero) {
            $this->id_viajero = $viajero['id_viajero'];
            $this->nombre = $viajero['nombre'];
            $this->apellido1 = $viajero['apellido1'];
            $this->apellido2 = $viajero['apellido2'];
            $this->direccion = $viajero['direccion'];
            $this->codigoPostal = $viajero['codigoPostal'];
            $this->ciudad = $viajero['ciudad'];
            $this->pais = $viajero['pais'];
            $this->email = $viajero['email'];
        }
}
public function mostrarViajeros()
    {
        return Viajero::all(); // Retorna todos los viajeros
    }
public function mostrarViajeroXemail($email)
    {
        return Viajero::where('email', $email)->first(); // Retorna el viajero por email
    }

    

    public function eliminarViajero($id)
    {
        $viajero = Viajero::findOrFail($id);
        $viajero->delete();
        return response()->json(['message' => 'Viajero eliminado correctamente'], 200);
    }
}
