<?php

namespace App\Http\Controllers\Api;

use App\Pedido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PedidoResource;

class PedidoController extends Controller
{

    public function index()
    {
        $pedidos = Pedido::orderBy('id','DESC')
            ->paginate(20);

        return PedidoResource::collection($pedidos);
    }

    public function show(Pedido $pedido)
    {
        return new PedidoResource($pedido);
    }


    public function store(Request $request)
    {
        $pedido = $this->validate($request, [
            'vianda_id'=>'required', 
        	'persona_id'=>'required', 
            'fecha_solicitud'=>'required', 
        	'fecha_entrega'=>'required' 
        ]);

        $pedido = Pedido::create($pedido);

        return new PedidoResource($pedido);
    }

        public function update(Request $request, $id)    {
        //
        $this->validate($request,[ 
            'vianda_id'=>'required', 
        	'persona_id'=>'required', 
            'fecha_solicitud'=>'required', 
        	'fecha_entrega'=>'required' 
        ]);

        $pedido = Pedido::find($id);
        
        $pedido->update($request->all());
        
        return new PedidoResource($pedido);
    }
}