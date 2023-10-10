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
            'apellido' => 'required|string|min:2|max:100',
            'telefono' => 'required',
            'direccion' => 'required',
            'genero' => 'required|max:1',
            'email' => 'required|string|email|max:100|unique:users',
        ]);

        try {
            // Comprueba si se proporciona un campo 'password' en la solicitud
            if ($request->has('password')) {
                $password = Hash::make($request->password);
            } else {
                // Si no se proporciona un campo 'password', usa el campo 'ci' como contraseña
                $password = Hash::make($request->ci);
            }

            // Crea el usuario con la contraseña determinada
            $user = User::create([
                'email' => $request->email,
                'password' => $password
            ]);

            // Verificar que el usuario se haya creado correctamente
            if (!$user) {
                throw new \Exception('Error al crear el usuario');
            }

            // Crear un nuevo cliente relacionado con el usuario
            $cliente = new Cliente([
                'ci' => $request->ci,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'genero' => $request->genero,
            ]);

            // Asociar el cliente con el usuario
            $user->cliente()->save($cliente);

            return response()->json([
                'status' => true,
                'message' => 'Cliente registrado exitosamente',
                'user' => $user,
                'cliente' => $cliente
            ], 201);

        } catch (\Exception $e) {
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
                'message' => 'Inicio sesión exitoso',
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
            'message' => 'Cierre de sesión exitoso'
        ]);
    }

    public function profile()
    {
        return response()->json([
            'status' => true,
            'message' => 'Datos del perfil del usuario',
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
            "message" => "Nuevo token de acceso generado",
            "token" => $newToken
        ]);
    }

}
