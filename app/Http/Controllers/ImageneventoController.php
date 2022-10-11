<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Evento;
use App\Models\Imagenevento;
use App\Models\Imagenperfil;
use App\Models\Organizador;
use Aws\Rekognition\RekognitionClient;
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
            $path = $Directorio.$request->file('file')->getClientOriginalName();
            $rutita = 'https://mycontenedor23.s3.amazonaws.com/'.$Directorio.$request->file('file')->getClientOriginalName();
            //return $rutita;
            $result = $s3Client->putObject([
                'Bucket' => 'mycontenedor23',
                'Key' => $Directorio.$request->file('file')->getClientOriginalName(),
                'Body'   => fopen($request->file('file')->getPathName(), 'r'),
                'ACL'    => 'public-read',
            ]);


            $rekoClient = new RekognitionClient([
                'version' => 'latest',
                'region'  => 'us-east-1'
            ]);

            $clientes = Cliente::all();
            foreach($clientes as $cliente){
                //return "yeah";
                if($cliente->user()->hayPath){
                    /* return "yeah"; */
                        $results = $rekoClient->compareFaces([
                            'SimilarityThreshold' => 95,
                            'SourceImage' => [
                                'S3Object' => [
                                    'Bucket' => 'mycontenedor23',
                                    'Name' => $cliente->user()->path,
                                ]
                            ],
                            'TargetImage' =>[
                                'S3Object' => [
                                    'Bucket' => 'mycontenedor23',
                                    'Name' => $path,
                                ]
                            ],
                        ]);
                        if( count ($results->toArray()['FaceMatches'])){
                            /* $ImageId = $results->toArray()['FaceMatches'][0]['Face']['ImageId']; */
                            
                            $imagen = new Imagenperfil();
                            $imagen->name = $cliente->user()->name;
                            $imagen->url = $rutita;
                            $imagen->user_id = $cliente->user_id;
                            $imagen->save();
                        }
                }
            }

            $iamgenevento = new Imagenevento();
            $iamgenevento->name = $request->name;
            $iamgenevento->url = $rutita;
            $iamgenevento->evento_id =  $request->evento_id;
            $iamgenevento->fotografo_id = $request->fotografo_id;
            $iamgenevento->save();
        
        }catch(S3Exception $e){
            return $e->getMessage() . "\n";
        }

        $contrato = Contrato::find($request->contrato_id);
        return redirect()->route('contratos.show',compact('contrato'));
    }
}
