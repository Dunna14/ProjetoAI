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
        'ref_pagamento',
        'cliente_id',
        'data',
        'preco_total_sem_iva',
        'iva',
        'preco_total_com_iva'
    ];

    public function Cliente() {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id') -> withTrashed();
    }

    public function Bilhetes() {
        return $this->hasMany(Bilhete::class, 'recibo_id', 'id');
    }

}
