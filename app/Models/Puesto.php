<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Puesto extends Model
{
    use HasFactory;
    public function empleados(): HasMany
    {
        return $this->hasMany(Empleado::class, 'puesto_id');
    }
}
