<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marca extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'nombre',
    ];

    public function vehiculos(): HasMany
    {
        return $this->hasMany(vehiculo::class, 'marca_id');
    }
    public function modelo(): HasMany
    {
        return $this->hasMany(modelo::class, 'marca_id');
    }
}
