<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        //
        $empleado = Empleado::all();
        return response()->json($empleado);
    }
}
