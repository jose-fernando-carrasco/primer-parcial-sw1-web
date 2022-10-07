<?php

namespace App\Models;

use App\Http\Requests\StoreContrato;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente_contrato extends Model
{
    use HasFactory;
    protected $table = "cliente_contrato";
    protected $primaryKey = ['cliente_id','contrato_id'];
    public $incrementing = false;

    public function cargarTabla(StoreContrato $request){
        $Contrato = new Contrato();
        $Contrato->detalle = $request->detalle;
        $Contrato->clausulaDelEvento = $request->clausulaDelEvento;
        $Contrato->politicaCancelacion = $request->politicaCancelacion;
        $Contrato->plazoDeEntrega = $request->plazoDeEntrega;
        $Contrato->tipopago_id = $request->tipopago_id;
        $Contrato->evento_id = $request->evento_id;
        $Contrato->fotografo_id = $request->fotografo_id;
        $Contrato->organizador_id = $request->organizador_id;
        //$Contrato->estado_id = 1;//estado pendiente
        $Contrato->save();

        for($i=0; $i < count($request->seleU); $i++) { 
            $ClienteContrato = new Cliente_contrato();
            $ClienteContrato->cliente_id = $request->seleU[$i];
            $ClienteContrato->contrato_id = $Contrato->id;
            $ClienteContrato->save();
        }
    }

}
