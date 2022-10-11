<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvento;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Evento;
use App\Models\Tipoevento;
use App\Models\User;
use Illuminate\Http\Request;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;

class EventoController extends Controller
{
    public function create(){
        $tiposEventos = Tipoevento::all();
        return view('eventos.create',compact('tiposEventos'));
    }

    public function store(StoreEvento $request){
        $evento = Evento::create($request->all());
        return redirect()->route('eventos.create')->with('info','ok');
    }

    public function index(){//Solo Organizador
        $user = User::find(Auth()->user()->id);
        $Eventos = Evento::where('organizador_id',$user->organizador()->id)->where('eliminado',false)->get();
        return view('eventos.index',compact('Eventos'));
    }

    public function generarQR(){
        return view('eventos.show');
    }

    public function storeQR(Request $request){
        //return $request;

        try {
            $s3Client = new S3Client([
                'version' => 'latest',
                'region'  => 'us-east-1'
            ]);
            
            $result = $s3Client->putObject([
                'Bucket' => 'mycontenedor23',
                'Key' => 'Promo/'.$request->file('file')->getClientOriginalName(),
                'Body'   => fopen($request->file('file')->getPathName(), 'r'),
                'ACL'    => 'public-read',
            ]);
        
        } catch(S3Exception $e) {
            return $e->getMessage() . "\n";
        }

        return redirect()->route('eventos.generarQR');
    }

    public function especifico($id){
         return view('eventos.especifico');
    }

    public function update(Evento $Evento){//solo el fotografo
        //return $Evento;
        switch ($Evento->estadoevento_id) {
            case 1: $Evento->estadoevento_id = 2;
                    break;
            case 2: $Evento->estadoevento_id = 3;
                    break;
            case 3: $Evento->estadoevento_id = 3;
                    break;
        }
        //return $contrato->estado_id;
        $Evento->update();
        
        return redirect()->route('eventos.index');
    }

    public function eliminar(Evento $Evento){
        $Evento->eliminado = true;
        $Evento->update();
        return redirect()->route('eventos.index');
    }

    public function indexcliente($id){
        $cliente = Cliente::where('user_id',$id)->first();
        $EventosInvitados = Evento::select('eventos.*')
                                    ->join('invitacions','eventos.id','=','invitacions.evento_id')
                                    ->where('invitacions.cliente_id',$cliente->id)->get();
        
        $EventosContratos = Contrato::select('eventos.*')
                             ->join('eventos','contratos.evento_id','=','eventos.id')
                             ->join('cliente_contrato','contratos.id','=','cliente_contrato.contrato_id')
                             ->where('cliente_contrato.cliente_id',$cliente->id)->get();
   
        return view('eventos.indexcliente',compact('EventosInvitados','EventosContratos'));
    }

}
