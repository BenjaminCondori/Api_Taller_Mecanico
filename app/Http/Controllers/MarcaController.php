<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{

    public function index()
    {
        //
        $marca = marca::all();
        return response()->json($marca);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
        $marca = new marca();
        $marca->nombre = $request->nombre;
        
        $marca->save();
        $data = [
            'message' => 'Marca registrada satisfactoriamente',
            'Marca' => $marca
        ];
        return response()->json($data);
    }
    public function show(marca $marca)
    {
        //
        return response()->json($marca);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, marca $marca)
    {
        //
        $marca->nombre = $request->nombre;
        $marca->save();
        $data = [
            'message' => 'Marca actualizada satisfactoriamente',
            'Marca' => $marca
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(marca $marca)
    {
        //
        $marca->delete();
        $data = [
            'message' => 'Marca eliminada satisfactoriamente',
            'Marca' => $marca
        ];
        return response()->json($data);
    }

}
