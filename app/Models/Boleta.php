<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Boleta extends Model
{
    use HasFactory;
    public function detalleCompras(): HasMany
    {
        return $this->hasMany(DetalleCompra::class);
    }
    //conexion FK
    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }
}
