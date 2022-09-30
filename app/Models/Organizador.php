<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    use HasFactory;
    protected $table = "organizadors";
    
    public function user(){
        $user = User::find($this->user_id);
        return $user;
    }

}
