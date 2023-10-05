<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    // Registrar un nuevo cliente
    public function register(Request $request)
    {
        // Validación de datos
        $request->validate([
            'ci' => 'required|unique:clientes',
            'nombre' => 'required|string|min:2|max:100',
            // 'apellido' => 'required|string|min:2|max:100',
            'telefono' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        try {
            // Iniciar una transacción de base de datos
            DB::beginTransaction();

            // Crear un nuevo usuario
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            // Verificar que el usuario se haya creado correctamente
            if (!$user) {
                throw new \Exception('Error al crear el usuario');
            }

            // Crear un nuevo cliente relacionado con el usuario
            $cliente = new Cliente([
                'ci' => $request->ci,
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'genero' => $request->genero,
            ]);

            // Asociar el cliente con el usuario
            $user->cliente()->save($cliente);

            // Confirmar la transacción
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Cliente registrado exitosamente',
                'user' => $user,
                'cliente' => $cliente
            ], 201);

        } catch (\Exception $e) {
            // En caso de error, revertir la transacción y devolver un mensaje de error
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => 'Error al registrar el cliente: ' . $e->getMessage()
            ], 500);
        }
    }


    // Inicio de sesión del usuario
    public function login(Request $request)
    {
        // Validación de datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // JWTAuth and attempt
        $token = JWTAuth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!empty($token)) {
            // Respuesta
            return response()->json([
                'status' => true,
                'message' => 'User successfully logged',
                'token' => $token,
                'user' => auth()->user(),
            ]);
        }

        return response()->json([
            'status' => false,
            'error' => 'Unauthorized'
        ], 401);
    }


    // Cierre de sesión del usuario
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'status' => true,
            'message' => 'User successfully logged out'
        ]);
    }

    public function profile()
    {
        return response()->json([
            'status' => true,
            'message' => 'Profile data',
            'user' => auth()->user()
        ]);

        // return response()->json(auth()->user());
    }

    // Para generar el valor del token actualizado
    public function refreshToken()
    {
        $newToken = auth()->refresh();

        return response()->json([
            "status" => true,
            "message" => "New access token generated",
            "token" => $newToken
        ]);
    }

}
