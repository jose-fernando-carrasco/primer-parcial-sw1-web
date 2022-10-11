<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitacion extends Model
{
    use HasFactory;
    protected $table = "invitacions";
    protected $fillable = ['organizador_id','evento_id','seleU'];

    public function evento(){
        $evento = Evento::find($this->evento_id);
        return $evento;
    }

    public function organizador(){
        $organizador = Organizador::find($this->organizador_id);
        return $organizador;
    }

    public function cliente(){
        $cliente = Cliente::find($this->cliente_id);
        return $cliente;
    }

    public function setInvitaciones(Request $request){
        for($i=0; $i < count($request->seleU); $i++) { 
            $Invitacion = new Invitacion();
            $Invitacion->organizador_id = $request->organizador_id;
            $Invitacion->evento_id = $request->evento_id; 
            $Invitacion->cliente_id = $request->seleU[$i];
            $Invitacion->save();
        } 
    }


    public function estado(){
        $estado = Estadoinvitacion::find($this->estadoinvitacion_id);
        return $estado;
    }

}
