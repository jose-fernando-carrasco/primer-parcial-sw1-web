<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Fotografo;
use App\Models\Tipopago;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function create(){
        $Eventos    = Evento::all();
        $Fotografos = Fotografo::all();
        $TiposPagos = Tipopago::all();
        return view('contratos.create',compact('Eventos','Fotografos','TiposPagos'));
    }
}
