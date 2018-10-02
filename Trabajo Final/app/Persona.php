<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    // Agregado para la referencia a campos de la tabla Persona
    protected $fillable = ['nombre', 'apellido', 'email'];

    /**
     * Relacion con las viandas que le pertenecen a la persona.
     */
    public function viandas()
    {
        //return $this->belongsToMany('App\Vianda');
        return $this->belongsToMany('App\Vianda', 'pedidos', 'vianda_id', 'persona_id');
    }
}
