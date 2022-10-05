<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvento;
use App\Models\Evento;
use App\Models\Tipoevento;
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

}
