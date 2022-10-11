<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenevento extends Model
{
    use HasFactory;
    protected $table = "imageneventos";

    public function fotografo(){
        $foto = Fotografo::find($this->fotografo_id);
        return $foto;
    }

}
