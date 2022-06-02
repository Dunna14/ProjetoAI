<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'genero_code',
        'ano',
        'sumario',
        'trailer_url'
    ];

    public function Sessoes() {
        return $this->hasMany(Sessao::class, 'filme_id', 'id');
    }

    public function Genero() {
        return $this->belongsTo(Genero::class, 'genero_code', 'code') -> withTrashed();
    }
}
