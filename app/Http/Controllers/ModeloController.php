<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelo;

class ModeloController extends Controller
{
    public function index()
    {
        //
        $modelo = modelo::all();
        return response()->json($modelo);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
        $modelo = new modelo();
        $modelo->nombre = $request->nombre;
        $modelo->marca_id = $request->marca_id;
        $modelo->save();
        $data = [
            'message' => 'Modelo registrado satisfactoriamente',
            'Modelo' => $modelo
        ];
        return response()->json($data);
    }
    public function show(modelo $modelo)
    {
        //
        return response()->json($modelo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(modelo $modelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, modelo $modelo)
    {
        //
        $modelo->nombre = $request->nombre;
        $modelo->save();
        $data = [
            'message' => 'Modelo actualizado satisfactoriamente',
            'Modelo' => $modelo
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(modelo $modelo)
    {
        //
        $modelo->delete();
        $data = [
            'message' => 'Modelo eliminado satisfactoriamente',
            'Modelo' => $modelo
        ];
        return response()->json($data);
    }

}
