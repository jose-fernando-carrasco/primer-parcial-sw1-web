<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContrato;
use App\Models\Contrato;
use App\Models\Evento;
use App\Models\Fotografo;
use App\Models\Tipopago;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function create(){
        $Eventos    = Evento::all();
        $Fotografos = (new Fotografo())->getFotografos();
        $TiposPagos = Tipopago::all();
        return view('contratos.create',compact('Eventos','Fotografos','TiposPagos'));
    }

    public function store(StoreContrato $request){
        $contrato = Contrato::create($request->all());
        return redirect()->route('contratos.create')->with('info','ok');
    }

}
