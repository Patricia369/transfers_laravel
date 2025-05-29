<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Viajero;

class ViajeroController extends Controller
{
    //listar viajero en funcion index de prueba
    public function index()
    {
        $viajeros = Viajero::all();
        
        return response()->json($viajeros); 
    }
    //crear viajero
     public function createViajero(Request $request){
         $request->validate([
             'nombre' => 'required|string|max:100',
             'apellido1' => 'required|string|max:100',
             'apellido2' => 'nullable|string|max:100',
             'direccion' => 'required|string|max:100',
             'codigoPostal' => 'required|string|max:10',
             'ciudad' => 'required|string|max:100',
             'email' => 'required|email|unique:transfer_viajeros,email',
             'password' => 'required|string|min:4|confirmed',
         ]);
            Viajero::createViajero($request->all());
        return response()->json(['message' => 'Viajero creado correctamente'], 201);
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
        return response()->json(['message' => 'Viajero actualizado correctamente'], 200);
    }
    //eliminar viajero
    public function deleteViajero($id){
        $viajero = Viajero::findOrFail($id);
        $viajero->delete();
        return response()->json(['message' => 'Viajero eliminado correctamente'], 200);
    }
}
