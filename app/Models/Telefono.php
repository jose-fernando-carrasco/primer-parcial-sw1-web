<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;
    protected $table = "telefonos";

    public function user(){
        $user = User::where('id',$this->user_id)->first();
        return $user;
    }
}
