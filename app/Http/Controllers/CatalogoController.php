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
    public function index(){//solo fotgrafos
       $fotografo = Fotografo::where('user_id',auth()->user()->id)->first();
       $catalogos = Catalogo::where('fotografo_id',$fotografo->id)->get();
       return view('catalogos.index',compact('catalogos'));
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

        return redirect()->route('catalogos.index')->with('info', 'La imagen se cargo a s3');
    }

    public function create(){
        $imagenCatalogo = Catalogo::find(1);
        return view('catalogos.show',compact('imagenCatalogo'));
    }
}
