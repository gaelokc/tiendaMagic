<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carta;

class ventasController extends Controller
{
    
    public function crearVenta(Request $request){

		//He dedidido que los administradores no pueden hacer ventas solo particulares y profesionales

    	if(!$usuario->rol == 'Administrador'){

    		return "autorizado";

			$respuesta = "";

			//Procesar los datos recibidos
			$datos = $request->getContent();

			//Verificar que hay datos
			$datos = json_decode($datos);

			if($datos){
				//TODO: validar los datos introducidos
				if($datos){
					//Crear la venta
					$venta = new Venta();


					//Valores obligatorios
					$carta->nombre_carta = $datos->nombre_carta;
					$carta->id = $datos->id;
					$usuario->nombre = $datos->nombre;
					$venta->ejemplares = $venta->ejemplares;
					$venta->precio = $datos->precio;
					
					//Guardar la venta
					try{

						$venta->save();

						$respuesta = "OK";
					}catch(\Exception $e){
						$respuesta = $e->getMessage();
					}

				}else{
					$respuesta = "Identificador de venta incorrecto";
				}

			}else{
				$respuesta = "Datos incorrectos";
			}
			


			return response($respuesta);
		}
		if($usuario->Rol == 'Administrador'){

			return "no autorizado";}
	}


}
