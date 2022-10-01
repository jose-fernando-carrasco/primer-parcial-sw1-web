<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoevento extends Model
{
    use HasFactory;
    protected $table = "tipoeventos";

    public function eventos(){
        $eventos = Evento::where('tipoevento_id',$this->id)->get();
        return $eventos;
    }

}
