<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipopago extends Model
{
    use HasFactory;
    protected $table = "tipopagos";

    public function contratos(){
        $contratos = Contrato::where('tipopago_id',$this->id)->get();
        return $contratos;
    }

}
