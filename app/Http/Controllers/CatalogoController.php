<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatalogo;
use App\Models\Catalogo;
use App\Models\Fotografo;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogoController extends Controller
{
    public function index(){//solo fotgrafos y organizadores
       if(auth()->user()->tipoCuenta == 2){ 
            $fotografos = Fotografo::where('user_id',auth()->user()->id)->get();
       }else{ // == 1  nunca == 3
            $fotografos = Fotografo::all();
       }//asumimos que es organizador
            
        return view('catalogos.index',compact('fotografos'));
    }

    public function store(StoreCatalogo $request){//solo fotografos
       
        try {
                
            $s3Client = new S3Client([
                'version' => 'latest',
                'region'  => 'us-east-1'
            ]);
            
            $newDirectorio = 'Fotografos/'.auth()->user()->name.'/Catalogos/'.$request->titulo.'/';
            Storage::disk('s3')->makeDirectory($newDirectorio);
            $rutita = 'https://mycontenedor23.s3.amazonaws.com/'.$newDirectorio.$request->file('file')->getClientOriginalName();
            
            $result = $s3Client->putObject([
                'Bucket' => 'mycontenedor23',
                'Key' => $newDirectorio.$request->file('file')->getClientOriginalName(),
                'Body'   => fopen($request->file('file')->getPathName(), 'r'),
                'ACL'    => 'public-read',
            ]);
            
            $catalogo = Catalogo::create($request->all());
            $catalogo->url = $rutita;
            $catalogo->update();

        } catch (S3Exception $e) {
            return $e->getMessage() . "\n";
        }

        return redirect()->route('catalogos.index');
    }

    

    


}
