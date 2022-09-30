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
    
}
