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
    public function create(){// solo organizadores
        $Eventos    = Evento::all();
        $TiposPagos = Tipopago::all();
        $Fotografos = (new Fotografo())->getFotografos();
        $clientes   = (new Cliente())->getClientes();
        return view('contratos.create',compact('Eventos','Fotografos','TiposPagos','clientes'));
    }

    public function store(StoreContrato $request){
        //return $request;
        (new Cliente_contrato())->cargarTabla($request);
        return redirect()->route('contratos.create')->with('info','ok');
    }

    public function index(){

        $user = User::find(auth()->user()->id);
        if(auth()->user()->tipoCuenta == 1){//organizador
            $contratos = Contrato::where('organizador_id',$user->organizador()->id)->get();
            //return $contratos;
        }

        if(auth()->user()->tipoCuenta == 2){//Fotografo
            $contratos = Contrato::where('fotografo_id',$user->fotografo()->id)->get();
            return $contratos;
        }
        //pendiente
        
        return view('contratos.index',compact('contratos'));
    }

}
