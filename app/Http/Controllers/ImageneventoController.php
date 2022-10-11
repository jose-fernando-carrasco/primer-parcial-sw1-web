<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Evento;
use App\Models\Imagenevento;
use App\Models\Organizador;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageneventoController extends Controller
{
    public function store(Request $request){
        //return $request;
        try {
            $s3Client = new S3Client([
                'version' => 'latest',
                'region'  => 'us-east-1'
            ]);
            
            $evento = Evento::find($request->evento_id);
            $organizador = $evento->organizador()->user()->name;

            $Directorio = 'Organizadores/'.$organizador.'/'.$evento->titulo.'/';
            /* Storage::disk('s3')->makeDirectory($newDirectorio); */
            $rutita = 'https://mycontenedor23.s3.amazonaws.com/'.$Directorio.$request->file('file')->getClientOriginalName();
            //return $rutita;
            $result = $s3Client->putObject([
                'Bucket' => 'mycontenedor23',
                'Key' => $Directorio.$request->file('file')->getClientOriginalName(),
                'Body'   => fopen($request->file('file')->getPathName(), 'r'),
                'ACL'    => 'public-read',
            ]);

            $iamgenevento = new Imagenevento();
            $iamgenevento->name = $request->name;
            $iamgenevento->url = $rutita;
            $iamgenevento->evento_id =  $request->evento_id;
            $iamgenevento->fotografo_id = $request->fotografo_id;
            $iamgenevento->save();
        
        } catch(S3Exception $e) {
            return $e->getMessage() . "\n";
        }

        $contrato = Contrato::find($request->contrato_id);
        return redirect()->route('contratos.show',compact('contrato'));

    }
}
