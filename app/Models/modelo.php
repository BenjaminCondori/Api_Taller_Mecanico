<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelo extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'nombre',
    ];
    public function marca(): BelongsTo
    {
        return $this->belongsTo(marca::class, 'marca_id');
    }
}
