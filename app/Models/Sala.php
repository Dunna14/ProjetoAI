<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sala extends Model
{
    use HasFactory, SoftDeletes;

    protected $timestamp = false;

    protected $fillable = [
        'nome',
    ];

    public function Lugares() {
        return $this->hasMany(Lugar::class, 'sala_id', 'id');
    }

    public function Sessoes() {
        return $this->hasMany(Sessao::class, 'sala_id', 'id');
    }
}
