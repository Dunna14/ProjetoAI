<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lugar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "lugares";
    public $timestamps = false;

    protected $fillable = [
        'fila',
        'posicao',
        'sala_id'
    ];

    public function bilhetes() {
        return $this->hasMany(Bilhete::class, 'lugar_id', 'id');
    }

    public function sala() {
        return $this->belongsTo(Sala::class, 'bilhete_id', 'id') -> withTrashed();
    }
}
