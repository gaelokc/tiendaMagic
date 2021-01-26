<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Models\Carta;
use App\Models\Coleccion;

class coleccionController extends Controller
{
    
    public function crearColeccion(Request $request){

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
					//Crear la coleccion
					$coleccion = new Coleccion();


					//Valores obligatorios
					$coleccion->nombre_coleccion = $datos->nombre_coleccion;
					$coleccion->imagen_coleccion = $datos->imagen_coleccion;
					$coleccion->fecha_edicion = $datos->fecha_edicion;
					
					//Guardar la coleccion
					try{

						$coleccion->save();

						$respuesta = "OK";
					}catch(\Exception $e){
						$respuesta = $e->getMessage();
					}

				}else{
					$respuesta = "Identificador de coleccion incorrecto";
				}

			}else{
				$respuesta = "Datos incorrectos";
			}
			


			return response($respuesta);
		}
		if(!$usuario->Rol == 'Administrador'){

			return "no autorizado";}
	}


	public function editarColeccion(Request $request,$id){

		if($usuario->Rol == 'Administrador'){

			return "autorizado";

			$respuesta = "";

			//Buscar si existe la coleccion
			$coleccion = Coleccion::find($id);

			if($coleccion){

				//Procesar los datos recibidos
				$datos = $request->getContent();

				//Verificar que hay datos
				$datos = json_decode($datos);

				if($datos){

					//TODO: validar los datos introducidos

					//Valores obligatorios
					if(isset($datos->nombre_coleccion))
						$coleccion->nombre_coleccion = $datos->nombre_coleccion;
					if(isset($datos->descripcion))
	                	$coleccion->imagen_coleccion = $datos->imagen_coleccion;
					if(isset($datos->coleccion))
	                	$coleccion->fecha_edicion = $datos->fecha_edicion;

					//Guardar la coleccion
					try{

						$coleccion->save();

						$respuesta = "OK";
					}catch(\Exception $e){
						$respuesta = $e->getMessage();
					}
				}else{
					$respuesta = "Datos incorrectos";
				}
			}else{
				$response = "No se ha encontrado la coleccion";
			}


			return response($respuesta);
		} if(!$usuario->Rol == 'Administrador'){

			return "no autorizado"; }
	}	

	//DAR DE BAJA A UNA COLECCION

	public function bajaColeccion(Request $request,$id){

		if($usuario->Rol == 'Administrador'){

			return "autorizado"; 

			$respuesta = "";

			//Buscar si existe la coleccion
			$coleccion = Coleccion::find($id);

			if($coleccion){

				//Procesar los datos recibidos
				$datos = $request->getContent();

				//Verificar que hay datos
				$datos = json_decode($datos);

				if($datos){

					//TODO: validar los datos introducidos

					//Valores obligatorios

					//Guardar la coleccion
					try{

						$coleccion->save();

						$respuesta = "OK";
					}catch(\Exception $e){
						$respuesta = $e->getMessage();
					}
				}else{
					$respuesta = "Datos incorrectos";
				}
			}else{
				$response = "No se ha encontrado la coleccion";
			}


			return response($respuesta);
		} if(!$usuario->Rol == 'Administrador'){

			return "no autorizado"; }
	}
//Ver coleccion individual y sus datos
	public function verColeccion($id){

		$coleccion = Coleccion::find($id);

		if($coleccion){

			return response()->json(

				[
					"id" => $coleccion->id,
					"nombre" => $coleccion->nombre_coleccion,
					"imagen" => $coleccion->imagen_coleccion,
					"fecha_edicion" => $coleccion->fecha_edicion,
				]

			);
		}

		return response("coleccion no encontrada");
	}

//LISTADO COMPLETO DE COLECCIONES


	public function listarColecciones(Request $request){

		$coleccion = Coleccion::all();

		return response()->json($coleccion);

	}

//LISTAR Y FILTRAR COLECCIONES Y VER CARTAS ASOCIADAS

	public function listarColeccionFiltro($parametro,$valor){

			if($parametro == "id")
				$coleccion = Coleccion::find($valor);
			else
				$coleccion = Coleccion::where('nombre_coleccion',$valor)->first();

			if($coleccion){

				$datoscoleccion = [
						"id" => $coleccion->id,
						"nombre_coleccion" => $coleccion->nombre_coleccion,
						"imagen" => $coleccion->imagen_coleccion,
						"fecha_edicion" => $coleccion->fecha_edicion,
					];

				return response()->json( $datosColeccion);
			}
			return response("Coleccion no encontrada");
		
	}

}
