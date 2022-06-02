<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $incrementing = false;

    protected $fillable = [
        'nif',
        'tipo_pagamento',
        'ref_pagamento'
    ];

    public function User() {
        return $this->belongsTo(User::class, 'id', 'id') -> withTrashed();
    }

    public function Recibos() {
        return $this->hasMany(Recibo::class, 'cliente_id', 'id');
    }

    public function Bilhetes() {
        return $this->hasMany(Bilhete::class, 'cliente_id', 'id');
    }
}
