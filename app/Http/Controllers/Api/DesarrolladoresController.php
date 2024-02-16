<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Desarrolladores;
use App\Http\Controllers\Controller; 

class DesarrolladoresController extends Controller
{

    public function __construct() {
    }


    public function crearDesarrollador(Request $request)
    {
      try 
      {      
        // Crear un nuevo desarrollador con los datos proporcionados
        $desarrollador = Desarrolladores::create([
          'nombre' => $request->nombre,
          'edad' => $request->edad,
          'habilidades' => $request->habilidades
        ]);

        // Devuelve una respuesta JSON con el desarrollador creado y el código de estado 201 (creado)
        return response()->json($desarrollador, 201);
      } 
      catch (\Exception $e) 
      {
        // En caso de error, registrar el error en el registro de errores y devolver una respuesta de error JSON con el código de estado 500 (error interno del servidor)
        \Log::error($e);
        return response()->json(['message' => 'Ocurrió un error al crear el desarrollador'], 500);
      }
    }

    public function actualizarDesarrollador(Request $request, $id)
    {
      try {
        // Buscar el desarrollador por su ID
        $desarrollador = Desarrolladores::findOrFail($id);
          
        // Actualizar el desarrollador con los datos proporcionados en la solicitud
        $desarrollador->update([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'habilidades' => $request->habilidades
        ]);

        // Devolver una respuesta JSON con el desarrollador actualizado y el código de estado 200 (éxito)
         return response()->json($desarrollador, 200);
      } catch (\Exception $e) {
        // En caso de error, registrar el error en el registro de errores y devolver una respuesta de error JSON con el código de estado 500 (error interno del servidor)
        \Log::error($e);
        return response()->json(['message' => 'Ocurrió un error al actualizar el desarrollador'], 500);
      }
    }


    public function listadoDesarrolladores()
    {
      try 
      {
        $listado = Desarrolladores::all();
        return response()->json($listado, 200);
      } 
      catch (\Exception $e) {
          
        \Log::error($e);
        return response()->json(['message' => 'Ocurrio un error'], 500);
      }
    }


    public function eliminarDesarrollador($id)
    {
      try 
      {
        // Buscar el desarrollador por su ID
        $desarrollador = Desarrolladores::findOrFail($id);
            
        // Eliminar permanentemente el desarrollador
        $desarrollador->forceDelete();

        // Devolver una respuesta JSON con un mensaje de éxito y el código de estado 200 (éxito)
        return response()->json(['message' => 'Desarrollador eliminado permanentemente con éxito'], 200);
      } 
      catch (\Exception $e) {
        // En caso de error, registrar el error en el registro de errores y devolver una respuesta de error JSON con el código de estado 500 (error interno del servidor)
        \Log::error($e);
        return response()->json(['message' => 'Ocurrió un error al eliminar el desarrollador'], 500);
      }
    }    
}
