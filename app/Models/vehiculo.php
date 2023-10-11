<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class vehiculo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'placa',
        'nro_chasis',
        'año',
        'color',
        'marca_id',
        'modelo_id',
        'cliente_id'
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
