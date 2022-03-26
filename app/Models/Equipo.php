<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'entrenador',
        'categoria',
        'cantidad_integrantes',
    ];

    /*public function entrenamientos() {
        return $this->belongsToMany(Entrenamiento::class, 'entrenamiento');
    } */
    
}
