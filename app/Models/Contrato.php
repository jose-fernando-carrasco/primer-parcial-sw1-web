<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $table = "contratos";
    protected $fillable = ['evento_id','detalle','clausulaDelEvento','politicaCancelacion','plazoDeEntrega','fotografo_id','tipopago_id','organizador_id','seleU'];

    public function tipoDePago(){
        $tipodepago = Tipopago::find($this->tipopago_id);
        return $tipodepago;
    }

    public function evento(){
        $evento = Evento::find($this->evento_id);
        return $evento;
    }

    public function fotografo(){
        $fotografo = Fotografo::find($this->fotografo_id);
        return $fotografo;
    }

    //Muchos a Muchos
    /* public function clientes(){
        $Clientes = Cliente_contrato::select('clientes.*')
                  ->join('clientes','cliente_contrato.cliente_id','=','clientes.id')
                  ->where('cliente_contrato.contrato_id',$this->id)->get();
        return $Clientes;
    } */

    public function clientes(){
        $Clientes = Cliente::select('clientes.*')->join('cliente_contrato','clientes.id','=','cliente_contrato.cliente_id')
                  ->where('cliente_contrato.contrato_id',$this->id)->get();
        return $Clientes;
    }

    public function estado(){
        $Estado = Estado::find($this->estado_id);
        return $Estado;
    }

    public function getContratoCIndex(){
        $user = User::find(auth()->user()->id);
        if(auth()->user()->tipoCuenta == 1){//organizador
            $contratos = Contrato::where('organizador_id',$user->organizador()->id)->where('eliminado',false)->get();
        }else{
            if(auth()->user()->tipoCuenta == 2){//Fotografo
                $contratos = Contrato::where('fotografo_id',$user->fotografo()->id)->where('eliminado',false)->get();
            }else{
                $contratos = null;
            }
        }
       return $contratos;
    }

}
