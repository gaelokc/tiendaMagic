<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['contraseña'] = Hash::make($request->contraseña);

        User::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Creacion de user correcta'
        ], 200);
    }

    public function login(Request $request) 
    {
        $user = User::whereEmail($request->email)->first();
        if(!is_null($user) && Hash::check($request->contraseña, $user->contraseña))
        {
            $user->api_token = Str::random(100);
            $user->save();
            return response()->json([
                'res' => true,
                'token' => $user->api_token,
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

    public function logout(){
        $user = auth()->User();
        $user->api_token = null;
        $user->save();
        return response()->json([
                'res' => true,
                'message' => 'Hasta pronto'
            ], 200);
    }
}
