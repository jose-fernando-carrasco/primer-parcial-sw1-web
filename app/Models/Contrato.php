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
    public function clientes(){
        $Clientes = Cliente_contrato::select('clientes.*')
                  ->join('clientes','cliente_contrato.cliente_id','=','clientes.id')
                  ->where('cliente_contrato.contrato_id',$this->id)->get();
        return $Clientes;
    }

    public function estado(){
        $Estado = Estado::find($this->estado_id);
        return $Estado;
    }

}
