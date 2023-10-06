<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new Usuario();
        $usuario->email = 'cesar@gmail.com';
        $usuario->password = '12345';
        $usuario->save();

        
        $usuario = new Usuario();
        $usuario->email = 'baljeet@gmail.com';
        $usuario->password = 'baljeet1';
        $usuario->save();

    }
}
