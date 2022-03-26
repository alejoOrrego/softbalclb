<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenamiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'hora',
        'equipos',
        'tipo_id',
    ];

    /*public function equipos() {
        return $this->belongsToMany(Equipo::class, 'equipos');
    }*/
    public function tipos() {
        return $this->hasmany(Tipo::class, 'tipos');
    }

}