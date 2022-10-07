<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContrato;
use App\Models\Cliente;
use App\Models\Cliente_contrato;
use App\Models\Contrato;
use App\Models\Evento;
use App\Models\Fotografo;
use App\Models\Organizador;
use App\Models\Tipopago;
use App\Models\User;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    //el commit 20 es antes de dañinear con S3
    public function create(){// solo organizadores
        $Eventos    = Evento::all();
        $TiposPagos = Tipopago::all();
        $Fotografos = (new Fotografo())->getFotografos();
        $clientes   = (new Cliente())->getClientes();
        return view('contratos.create',compact('Eventos','Fotografos','TiposPagos','clientes'));
    }


    public function store(StoreContrato $request){//solo organizador
        (new Cliente_contrato())->cargarTabla($request);
        return redirect()->route('contratos.create')->with('info','ok');
    }


    public function index(){// Solo Organizador y Fotografo
        $contratos = (new Contrato)->getContratoCIndex();
        return view('contratos.index',compact('contratos'));
    }


    public function show(Contrato $contrato){// solo Organizador puede ver
        $clientes = $contrato->clientes();   // El fotografo debe editar si acpetar
        if(auth()->user()->tipoCuenta == 2){//fotografo
            //return "es fotografo";
           // return redirect()->route('contratos.show')->compact('contrato','clientes')->with('info','ok');
            return view('contratos.show',compact('contrato','clientes'))->with('info','ok');
        }
        //return "No es fotografo";
        return view('contratos.show',compact('contrato','clientes'));
    }


    public function update(Contrato $contrato){//solo el fotografo
        
        switch ($contrato->estado_id) {
            case 1: $contrato->estado_id = 2;
                    break;
            case 2: $contrato->estado_id = 3;
                    break;
            case 3: $contrato->estado_id = 3;
                    break;
        }
        //return $contrato->estado_id;
        $contrato->update();
        
        return redirect()->route('contratos.index');
    }


}
