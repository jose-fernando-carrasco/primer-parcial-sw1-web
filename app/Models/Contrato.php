<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $table = "contratos";

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
    /*public function clientes(){
            $clientes = Cliente_contrato::select('contratos.*')
                         ->join('clientes','cliente_contrato.cliente_id','=','clientes.id')
                         ->where('cliente_contrato.contrato_id',$this->id)->get();
            return $clientes;
    }*/

}
