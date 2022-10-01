<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente_contrato extends Model
{
    use HasFactory;
    protected $table = "cliente_contrato";
    protected $primaryKey = ['cliente_id','contrato_id'];
    public $incrementing = false;


}
