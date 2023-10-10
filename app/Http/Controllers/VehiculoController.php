<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        //
        $vehiculo = vehiculo::all();
        return response()->json($vehiculo);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $vehiculo = new vehiculo;
       // $vehiculo->id = $request->id;
        $vehiculo->placa = $request->placa;
        $vehiculo->nro_chasis = $request->nro_chasis;
        $vehiculo->año = $request->año;
        $vehiculo->color = $request->color;
        $vehiculo->save();
        $data = [
            'message' => 'Vehiculo registrado satisfactoriamente',
            'Vehiculo' => $vehiculo
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(vehiculo $vehiculo)
    {
        //
        return response()->json($vehiculo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vehiculo $vehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vehiculo $vehiculo)
    {
        //
        $vehiculo->placa = $request->placa;
        $vehiculo->nro_chasis = $request->nro_chasis;
        $vehiculo->año = $request->año;
        $vehiculo->color = $request->color;
        $vehiculo->save();
        $data = [
            'message' => 'Vehiculo actualizado satisfactoriamente',
            'Vehiculo' => $vehiculo
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehiculo $vehiculo)
    {
        //
        $vehiculo->delete();
        $data = [
            'message' => 'Vehiculo eliminado satisfactoriamente',
            'Vehiculo' => $vehiculo
        ];
        return response()->json($data);
    }
}
