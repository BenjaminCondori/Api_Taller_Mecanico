<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // aqui ya no va nada juasjuas pinche frontend ojala quede bonito
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //crea el nuevo usuario con los campos email y password que recibió
        $usuario = new Usuario();
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();
        
        $data = [
            'message' => 'Usuario creado exitosamente',
            'usuario' => $usuario
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return response()->json($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        // ojito al frontend
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //editar 
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->save();

        
        $data = [
            'message' => 'Usuario modificado exitosamente',
            'usuario' => $usuario
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //destruir
        $usuario->delete();
        
        $data = [
            'message' => 'Usuario eliminado exitosamente',
            'usuario' => $usuario
        ];
        return response()->json($data);
    }
}
