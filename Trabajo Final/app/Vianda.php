<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vianda extends Model
{
    // Agregado para la referencia a campos de la tabla Vianda
    protected $fillable = ['nombre', 'descripcion', 'vegetariana', 'precio'];

    /**
     * Relacion con las personas que le pertenecen a la vianda.
     */
    public function personas()
    {
        //return $this->belongsToMany('App\Persona');
        return $this->belongsToMany('App\Persona', 'pedidos', 'vianda_id', 'persona_id');
    }
}
