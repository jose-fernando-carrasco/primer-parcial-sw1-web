<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = "eventos";
    protected $fillable = ['titulo','tipoevento_id','ubicacion','detalle','cantpersonas','organizador_id'];

    public function contratos(){
        $contratos = Contrato::where('evento_id',$this->id)->get();
        return $contratos;
    }

    public function tipoEvento(){
        $tipoEvento = Tipoevento::find($this->tipoevento_id);
        return $tipoEvento;
    }

    public function invitaciones(){
        $invitaciones = Invitacion::where('evento_id',$this->id)->get();
        return $invitaciones;
    }

    public function estado(){
        $estado = Estadoevento::find($this->estadoevento_id);
        return $estado;
    }

}
