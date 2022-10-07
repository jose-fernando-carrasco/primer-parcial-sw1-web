<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cliente_contrato;
use App\Models\Contrato;
use App\Models\Evento;
use App\Models\Invitacion;
use Illuminate\Http\Request;

class InvitacionController extends Controller
{
    
    public function create(Evento $Evento){//solo Organizador
        $clientes = (new Cliente())->getClientesLibres($Evento);
        return view('invitaciones.create',compact('clientes','Evento'));
    }

    public function store(Request $request){
        (new Invitacion())->setInvitaciones($request);
        return "Hola";
    }

}
