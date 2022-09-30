<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $table = "tipos";

    public function fotografos(){
        $fotografos = Fotografo::where('tipo_id',$this->id)->get();
        return $fotografos;
    }

}
