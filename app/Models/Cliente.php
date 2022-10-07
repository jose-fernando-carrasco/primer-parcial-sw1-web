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
    
    public function getClientes(){
        $getClientes = Cliente::select('clientes.id','users.name')
                                ->join('users','clientes.user_id','=','users.id')->get();
        return $getClientes;
    }

    public function getClientesLibres(Evento $Evento){

        //-------------Clientes que ya estan invitados---------------------------
        $IDClientes = Invitacion::select('invitacions.cliente_id')
                                    ->join('eventos','invitacions.evento_id','=','eventos.id')
                                    ->where('invitacions.evento_id',$Evento->id)->get();
        
        $Clientes1 = Cliente::select('clientes.id')
                            ->whereIn('clientes.id',$IDClientes)->get();
       
        //-----------------clientes que ya estan contratados--------------------------
        $Contratos = Contrato::select('contratos.id')
                                ->join('eventos','contratos.evento_id','=','eventos.id')
                                ->where('contratos.evento_id',$Evento->id)->get();
        
        $Clientes2 = Cliente_contrato::select('cliente_contrato.cliente_id')
                                ->whereIn('cliente_contrato.contrato_id',$Contratos)->get(); 
        
        //----------------------finalmente clientes libres--------------------------------
        $clientes = Cliente::whereNotIn('clientes.id',$Clientes1)
                            ->whereNotIn('clientes.id',$Clientes2)
                            ->get();
                    
        return $clientes; 
    }
}
