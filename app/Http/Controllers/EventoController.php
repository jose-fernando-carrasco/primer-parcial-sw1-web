<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvento;
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
        $Eventos = Evento::where('organizador_id',$user->organizador()->id)->get();
        //return $Eventos;
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
}
