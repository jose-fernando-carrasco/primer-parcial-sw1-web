<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvento;
use App\Models\Evento;
use App\Models\Tipoevento;
use App\Models\User;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function create(){
        $tiposEventos = Tipoevento::all();
        return view('eventos.create',compact('tiposEventos'));
    }

    public function store(StoreEvento $request){
        $evento = Evento::create($request->all());
        return redirect()->route('eventos.create')->with('info','ok');
    }

    public function index(){//Solo Organizador
        $user = User::find(Auth()->user()->id);
        $Eventos = Evento::where('organizador_id',$user->organizador()->id)->get();
        //return $Eventos;
        return view('eventos.index',compact('Eventos'));
    }

}
