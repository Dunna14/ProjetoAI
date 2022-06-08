<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    use HasFactory;

    protected $table = "Sessoes";

    protected $fillable = [
        'horario_inicio',
        'filme_id',
        'sala_id'
    ];

    public function Bilhetes() {
        return $this->hasMany(Bilhete::class, 'sessao_id', 'id');
    }

    public function Sala() {
        return $this->belongsTo(Sala::class, 'sala_id', 'id') -> withTrashed();
    }

    public function Filme() {
        return $this->belongsTo(Filme::class, 'filme_id', 'id');
    }
}