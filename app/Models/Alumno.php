<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //use HasFactory;

    // Funcion publica "nivel" para identicar la tabla a la que pertenece
    public function nivel(){
        return $this->belongsTo(Nivel::class, 'nivel_id', 'id');
    }

}
