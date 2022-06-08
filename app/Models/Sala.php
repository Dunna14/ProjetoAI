<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sala extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'nome',
    ];

    public function lugares() {
        return $this->hasMany(Lugar::class, 'sala_id', 'id');
    }

    public function sessoes() {
        return $this->hasMany(Sessao::class, 'sala_id', 'id');
    }
}
