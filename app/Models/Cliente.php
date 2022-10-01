<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "clientes";

    public function user(){
        $user = User::find($this->user_id);
        return $user;
    }

    public function invitaciones(){
        $invitaciones = Invitacion::where('cliente_id',$this->id)->get();
        return $invitaciones;
    }

    //Muchos a Muchos
    public function contratos(){
        $contratos = Cliente_contrato::select('contratos.*')
                     ->join('contratos','cliente_contrato.contrato_id','=','contratos.id')
                     ->where('cliente_contrato.cliente_id',$this->id)->get();
        return $contratos;
    }
    
}
