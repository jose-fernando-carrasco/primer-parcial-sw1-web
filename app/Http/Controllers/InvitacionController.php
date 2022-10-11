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
        $Evento = Evento::find($request->evento_id);
        return redirect()->route('invitaciones.create',compact('Evento'))->with('info','ok');
    }

    public function index(){
        $cliente = Cliente::where('user_id',auth()->user()->id)->first();
        $invitaciones = Invitacion::where('cliente_id',$cliente->id)->where('eliminado',false)->get();
        return view('invitaciones.index',compact('invitaciones'));
    }

    public function show($id){
       $invitacion = Invitacion::find($id);
       $cliente = CLiente::find($id);
       return view('invitaciones.show',compact('invitacion','cliente'));
    }

    public function aceptar($id){
       $invitacion = Invitacion::find($id);
       $invitacion->estadoinvitacion_id = 2;
       $invitacion->update();
       return redirect()->route('invitaciones.show',$invitacion);
    }

    public function eliminar(Invitacion $invitacion){
       $invitacion->eliminado = true;
       $invitacion->update();
       return redirect()->route('invitaciones.index');
    }
}
