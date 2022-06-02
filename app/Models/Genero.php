<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genero extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = "code";
    protected $keyType = "string";
    protected $incrementing = false;
    protected $timestamp = false;

    protected $fillable = [
        'name',
        'code'
    ];

    public function Filme() {
        return $this->hasMany(Filme::class, 'genero_code', 'code');
    }
}
