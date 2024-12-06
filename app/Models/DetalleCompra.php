<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleCompra extends Model
{
    use HasFactory;

    //Uno a muchos
    
    //Conexiones FK
    public function detalleVestimenta(): BelongsTo
    {
        return $this->belongsTo(DetalleVestimenta::class);
    }
    public function boleta(): BelongsTo
    {
        return $this->belongsTo(Boleta::class);
    }
    
}
