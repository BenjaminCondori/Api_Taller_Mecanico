<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    use HasFactory;

    // protected $primaryKey = 'ci';

    protected $fillable = [
        'ci',
        'nombre',
        'apellido',
        'genero',
        'telefono',
        'direccion',
        'user_id'
    ];

    public function user(): BelongsTo {
        return $this->BelongsTo(User::class, 'user_id');
    }

}
