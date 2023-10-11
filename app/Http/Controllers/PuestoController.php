<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function index()
    {
        //
        $puesto = Puesto::all();
        return response()->json($puesto);
    }
}
