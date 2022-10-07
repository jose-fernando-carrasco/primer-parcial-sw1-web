<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Evento;
use Illuminate\Http\Request;

class InvitacionController extends Controller
{
    
    public function create(){//solo Organizador
        $clientes = Cliente::all();
        $Eventos = Evento::all();
        return view('invitaciones.create',compact('clientes','Eventos'));
    }
}
