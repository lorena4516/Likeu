<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $agenda = Agenda::all();
        return $agenda;
        //Esta función nos devolvera los eventos creados que tenemos en BD
    }

    //realiza creacion del evento
    public function register_agenda(Request $request)
    {
        //validacion de los campos
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'asunto' => 'required|string|max:250',
            'fecha' => 'required|date|date_format:Y-m-d',
            'hora' => 'required|date_format:H:i',
            'estados' => 'required|string|in:programada,realizada,cancelada,no asignada',
        ]);

        //retorna error si encuentra
        if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
        }
        //realiza proceso de insercion
        $agenda = Agenda::create([
            'asunto' => $request->get('asunto'),
            'fecha' => $request->get('fecha'),
            'hora' => $request->get('hora'),
            'estados' => $request->get('estados'),
        ]);
        //revuelve datos insertados
        return response()->json(compact('agenda'),201);
    }

    //actualiza informacion del evento
    public function update_agenda(Request $request, $id_agenda){
        $agenda = Agenda::find($id_agenda);
        $agenda->asunto=$request->input('asunto');
        $agenda->fecha=$request->input('fecha');
        $agenda->hora=$request->input('hora');
        $agenda->estados=$request->input('estados');

        $agenda->save();
        return response()->json($agenda);   

    }

}
?>