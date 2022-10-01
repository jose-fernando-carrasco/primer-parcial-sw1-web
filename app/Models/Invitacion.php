<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitacion extends Model
{
    use HasFactory;
    protected $table = "invitacions";

    public function evento(){
        $evento = Evento::find($this->evento_id);
        return $evento;
    }

    public function organizador(){
        $organizador = Organizador::find($this->organizador_id);
        return $organizador;
    }

    public function cliente(){
        $cliente = Cliente::find($this->cliente_id);
        return $cliente;
    }

}
