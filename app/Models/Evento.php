<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = "eventos";
    protected $fillable = ['titulo','tipoevento_id','ubicacion','detalle','cantpersonas','organizador_id'];

    /* $Evento1 = new Evento();
        $Evento1->titulo = "Casamiento Jose y Mia";
        $Evento1->detalle = "Matrimonio del joven Jose con la señorita mia";
        $Evento1->ubicacion = "Av. San Aurelio / Calle 13 / Nro 159";
        $Evento1->cantpersonas = "100";
        $Evento1->tipoevento_id = 1;
        $Evento1->organizador_id = 1;//Fernando
        $Evento1->save(); */

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

}
