<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $cliente = Cliente::all();
        return $cliente;
        //Esta función nos devolvera todas los clintes que tenemos en nuestra BD
    }
    public function register_cliente(Request $request)
    {

        Log::info($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cedula' => 'required|unique:clientes|integer',
            'fecha_nacimiento' => 'required|date',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
        }

        $cliente = Cliente::create([
            'name' => $request->get('name'),
            'cedula' => $request->get('cedula'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
        ]);
        return response()->json(compact('cliente'),201);
    }

}
?>