<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nif',
        'nome_cliente',
        'tipo_pagamento',
        'ref_pagamento'
    ];

    public function Cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id') -> withTrashed();
    }

    public function Bilhetes() {
        return $this->hasMany(Bilhete::class, 'recibo_id', 'id');
    }

}
