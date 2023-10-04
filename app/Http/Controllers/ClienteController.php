<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cliente = Cliente::all();
        return response()->json($cliente);
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
        $cliente = new Cliente;
        $cliente->ci = $request->ci;
        $cliente->nombre = $request->nombre;
        $cliente->genero = $request->genero;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->save();
        $data = [
            'message' => 'Cliente creado satisfactoriamente',
            'Cliente' => $cliente
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
        return response()->json($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
        $cliente->nombre = $request->nombre;
        $cliente->genero = $request->genero;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->save();
        $data = [
            'message' => 'Cliente actualizado satisfactoriamente',
            'Cliente' => $cliente
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
        $cliente->delete();
        $data = [
            'message' => 'Cliente eliminado satisfactoriamente',
            'Cliente' => $cliente
        ];
        return response()->json($data);
    }
}
