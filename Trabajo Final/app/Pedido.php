<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    // Agregado para la referencia a campos de la tabla Pedido
    protected $fillable = ['persona_id', 'vianda_id', 'fecha_solicitud', 'fecha_entrega'];

}
