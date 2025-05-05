<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class lectorController extends Controller
{
    /**
     * Muestra todos los lectores
     */


     public function index()
    {
        $lectores = DB::table('lector')->get();

        return response()->json($lectores);
    }


    /**
     * Store se utiliza para crear un nuevo lector. nombre, apellido y email no pueden ser null
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:lector',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
        ]);

        return Lector::create($request->all());


    }
    /**
     * Devuelve la informacion del usuario con la id introducida
     */
    public function show($id)
    {
        $lector = Lector::findOrFail($id);
        return response()->json($lector);
    }


    /*
     * Modifica la informacion del usuario con la id introducida
     */
    public function update(Request $request, $id)
    {
        $lector = Lector::findOrFail($id);

        $request->validate([
            'nombre' => 'sometimes|required|string',
            'apellido' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:lector,email,' . $id,
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
        ]);

        $lector->update($request->all());

        return $lector;
    }

    /**
     * Remueve el usuario con la id introducida
     */
    public function destroy($id)
    {
        $lector = Lector::findOrFail($id);
        $lector->delete();

        return response()->json(['mensaje' => 'Lector eliminado']);
    }
}
