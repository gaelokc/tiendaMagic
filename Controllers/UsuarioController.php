<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsusarioController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['contraseña'] = Hash::make($request->contraseña);

        Usuario::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Creacion de usuario correcta'
        ], 200);
    }

    public function login(Request $request) 
    {
        $usuario = Usuario::whereEmail($request->email)->first();
        if(!is_null($usuario) && Hash::check($request->contraseña, $usuario->contraseña))
        {
            return response()->json([
                'res' => true,
                'message' => 'Login correcto'
            ], 200);
        }
        else {
            return response()->json([
                'res' => false,
                'message' => 'Usuario incorrecto'
            ], 200);
        }
    }
}
