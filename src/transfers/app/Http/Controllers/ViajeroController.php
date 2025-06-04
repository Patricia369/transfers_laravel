<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Viajero;
use Illuminate\Support\Facades\Hash;

class ViajeroController extends Controller
{
   
    //crear viajero
   public function crearViajero(Request $request)
{
   // dump($request->all());
    $request->validate([
        'nombre' => 'required|string|max:15',
        'apellido1' => 'required|string|max:15',
        'apellido2' => 'required|string|max:15',
        'direccion' => 'required|string|max:100',
        'codigoPostal' => 'required|string|max:8',
        'ciudad' => 'required|string|max:20',
        'pais' => 'required|string|max:20',
        'email' => 'required|email|unique:transfer_viajeros,email',
        'password' => 'required|string|min:4|confirmed',
        
    ]);
    
    // Crear el viajero
    Viajero::create([
        'nombre' => $request->nombre,
        'apellido1' => $request->apellido1,
        'apellido2' => $request->apellido2,
        'direccion' => $request->direccion,
        'codigoPostal' => $request->codigoPostal,
        'ciudad' => $request->ciudad,
        'pais' => $request->pais,
        'email' => $request->email,
        'password' => bcrypt($request->password), // Encriptar la contraseña
    ]);
    return redirect()->route('login')->with('success', 'Viajero creado correctamente.');
}
 
    
     //listar viajero en funcion index de prueba
    public function mostrarViajeros()
    {
        $viajeros = Viajero::all();

        return view('viajeros', compact('viajeros'));
    }
    //actualizar viajero
    public function updateViajero(Request $request, $id){
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido1' => 'required|string|max:100',
            'apellido2' => 'nullable|string|max:100',
            'direccion' => 'required|string|max:100',
            'codigoPostal' => 'required|string|max:8',
            'ciudad' => 'required|string|max:100',
            'email' => 'required|email|unique:transfer_viajeros,email,'.$id,
            'password' => 'nullable|string|min:4|confirmed',
        ]);
        $viajero = Viajero::findOrFail($id);
        $viajero->update($request->all());
        return $viajero; 
    }
    //eliminar viajero
    public function deleteViajero($id){
        $viajero = Viajero::findOrFail($id);
        $viajero->delete();
        return $viajero; 
    }
    public function loginViajero(Request $request){
     $rol = str_contains($request->email, '@admin') ? 'admin' : 'usuario';

         // Validar los datos de entrada
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string'
    ]);
    // Buscar al usuario
    $usuario = Viajero::where('email', $request->email)->first();
    // Verificar si el usuario existe
    if (!$usuario) {
        return redirect()->back()->withErrors(['email' => 'Sin registro de usuario.'])->withInput();

    }
     // Verificar contraseña
    if (Hash::check($request->password, $usuario->password)) {
        // Guardar datos en la sesión
        session([
            'usuario' => $usuario->email,
            'nombre' => $usuario->nombre,
            'rol' => str_contains($usuario->email, '@admin') ? 'admin' : 'usuario',
            'admin' => str_contains($usuario->email, '@admin'),
        ]);
        // Redirigir según el rol
        if ($rol === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Bienvenido, administrador.');
        } else {
            return redirect()->route('coorporativo')->with('success', 'Bienvenido, coorporativo.');
        }
    } else {
        return redirect()->back()->withErrors(['password' => 'Contraseña incorrecta'])->withInput();
    }
}
}
