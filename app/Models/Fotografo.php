<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografo extends Model
{
    use HasFactory;
    protected $table = "fotografos";

    public function user(){
        $user = User::find($this->user_id);
        return $user;
    }

    public function tipo(){
        $tipo = Tipo::find($this->tipo_id);
        return $tipo;
    }

    public function contratos(){
        $contratos = Contrato::where('fotografo_id',$this->id)->get();
        return $contratos;
    }

    public function getFotografos(){
        $fotografos = Fotografo::select('fotografos.id','users.name')
                                ->join('users','fotografos.user_id','=','users.id')->get();
        return $fotografos;
    }


    public function catalogos(){
        $catalogos = Catalogo::where('fotografo_id',$this->id)->get();
        return $catalogos;
    }
    
}
