<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',

    ];

    public function entrenamientos() {
        return $this->belongsToMany(Entrenamiento::class, 'entrenamientos');
    } 
}
