<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class comprasController extends Controller
{
    public function listarCompraFiltro($parametro,$valor){

			if($parametro == "id")
				$venta = Venta::find($valor);
			else
				$venta = Venta::where('nombre_carta',$valor)->first();

			if($carta){

				$datosventa = [
						"id" => $carta->id,
						"nombre_carta" => $carta->nombre_carta,
						"ejemplares" => $venta->ejemplares,
						"precio" => $venta->precio,
						"Nombre_usuario" => $usuario->nombre
					];

				return response()->json( $datosCarta);
			}
			return response("Carta no encontrada");
		
	}
}
