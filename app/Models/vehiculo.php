<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'placa',
        'nro_chasis',
        'año',
        'color',
    ];
    
    public function marca(): BelongsTo
    {
        return $this->belongsTo(marca::class, 'marca_id');
    }
    public function modelo(): BelongsTo
    {
        return $this->belongsTo(modelo::class, 'modelo_id');
    }
}
