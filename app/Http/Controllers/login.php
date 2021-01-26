<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Request\CreateUsuarioRequest;

class login extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    //POST para insertar datos
    public function store(CreateUsuarioRequest $request)
    {
        $input = $request->all();
        Usuario::create($input);
        return response()->json([
            'res' => true,
            'message' => 'login correcto'
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
