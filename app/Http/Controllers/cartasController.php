<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Models\Carta;
use App\Models\Coleccion;

class cartasController extends Controller
{
    
    public function crearCarta(Request $request){

    	if($usuario->rol == 'Administrador'){

    		return "autorizado";

			$respuesta = "";

			//Procesar los datos recibidos
			$datos = $request->getContent();

			//Verificar que hay datos
			$datos = json_decode($datos);

			if($datos){
				//TODO: validar los datos introducidos
				if($datos){
					//Crear la carta
					$carta = new Carta();


					//Valores obligatorios
					$carta->nombre_carta = $datos->nombre_carta;
					$carta->descripcion = $datos->descripcion;
					$carta->coleccion = $datos->coleccion;
					
					//Guardar la carta
					try{

						$carta->save();

						$respuesta = "OK";
					}catch(\Exception $e){
						$respuesta = $e->getMessage();
					}

				}else{
					$respuesta = "Identificador de carta incorrecto";
				}

			}else{
				$respuesta = "Datos incorrectos";
			}
			


			return response($respuesta);
		}
		if(!$usuario->Rol == 'Administrador'){

			return "no autorizado";}
	}


	public function editarCarta(Request $request,$id){

		if($usuario->Rol == 'Administrador'){

			return "autorizado";

			$respuesta = "";

			//Buscar si existe la carta
			$carta = Carta::find($id);

			if($carta){

				//Procesar los datos recibidos
				$datos = $request->getContent();

				//Verificar que hay datos
				$datos = json_decode($datos);

				if($datos){

					//TODO: validar los datos introducidos

					//Valores obligatorios
					if(isset($datos->nombre_carta))
						$carta->nombre_carta = $datos->nombre_carta;
					if(isset($datos->descripcion))
	                	$carta->descripcion = $datos->descripcion;
					if(isset($datos->coleccion))
	                	$carta->coleccion = $datos->coleccion;

					//Guardar la carta
					try{

						$carta->save();

						$respuesta = "OK";
					}catch(\Exception $e){
						$respuesta = $e->getMessage();
					}
				}else{
					$respuesta = "Datos incorrectos";
				}
			}else{
				$response = "No se ha encontrado la carta";
			}


			return response($respuesta);
		} if(!$usuario->Rol == 'Administrador'){

			return "no autorizado"; }
	}	

	//DAR DE BAJA A UNA CARTA

	public function bajaCarta(Request $request,$id){

		if($usuario->Rol == 'Administrador'){

			return "autorizado"; 

			$respuesta = "";

			//Buscar si existe la carta
			$carta = Carta::find($id);

			if($carta){

				//Procesar los datos recibidos
				$datos = $request->getContent();

				//Verificar que hay datos
				$datos = json_decode($datos);

				if($datos){

					//TODO: validar los datos introducidos

					//Valores obligatorios
					
					//Guardar la carta
					try{

						$carta->save();

						$respuesta = "OK";
					}catch(\Exception $e){
						$respuesta = $e->getMessage();
					}
				}else{
					$respuesta = "Datos incorrectos";
				}
			}else{
				$response = "No se ha encontrado la carta";
			}


			return response($respuesta);
		} if(!$usuario->Rol == 'Administrador'){

			return "no autorizado"; }
	}
//Ver carta individual y sus datos
	public function verCarta($id){

		$carta = Carta::find($id);

		if($carta){

			return response()->json(

				[
					"id" => $carta->id,
					"nombre" => $carta->nombre_carta,
					"coleccion" => $carta->coleccion,
					"descripcion" => $carta->descripcion
				]

			);
		}

		return response("Carta no encontrada");
	}

//LISTADO COMPLETO DE CARTAS 


	public function listarCartas(Request $request){

		$carta = Carta::all();

		return response()->json($carta);

	}

//LISTAR Y FILTRAR Cartas Y VER Coleccion ASOCIADAS

	public function listarCartasFiltro($parametro,$valor){

			if($parametro == "id")
				Log::info('El parametro ha coincidido con el valor id de una de las cartas');
				$carta = Carta::find($valor);
			else
				Log::info('El parametro no es un valor id de una de las cartas');
				$carta = Carta::where('nombre_carta',$valor)->first();

			if($carta){
				Log::info('Ha encontrado una carta');

				$datoscarta = [
						"id" => $carta->id,
						"nombre_carta" => $carta->nombre_carta,
						"descripcion" => $carta->descripcion,
						"coleccion" => $carta->coleccion,
					];

				return response()->json( $datosCarta);
				Log::info('Devuelve los datos de dicha carta');
			}
			return response("Carta no encontrada");
			Log::error('El programa no ha encontrado la carta seleccionada o el parametro no coincide con el valor requerido');
		
	}

}
