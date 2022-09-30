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

}
