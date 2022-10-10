<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Imagen;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    public function index($id){
        $imagenes = Imagen::where('catalogo_id',$id)->get();
        $catalogo = Catalogo::find($id);
        return view('catalogos.imagenes.index',compact('imagenes','catalogo'));
    }

    public function store(Request $request, $id){
        $request->validate(['name' => 'required']);
        $catalogo = Catalogo::find($id);
        try {
                
            $s3Client = new S3Client([
                'version' => 'latest',
                'region'  => 'us-east-1'
            ]);
            
            $Directorio = 'Fotografos/'.auth()->user()->name.'/Catalogos/'.$catalogo->titulo.'/';
            //Storage::disk('s3')->makeDirectory($newDirectorio);
            $rutita = 'https://mycontenedor23.s3.amazonaws.com/'.$Directorio.$request->file('file')->getClientOriginalName();
            
            $result = $s3Client->putObject([
                'Bucket' => 'mycontenedor23',
                'Key' => $Directorio.$request->file('file')->getClientOriginalName(),
                'Body'   => fopen($request->file('file')->getPathName(), 'r'),
                'ACL'    => 'public-read',
            ]);
            
            $imagen = new Imagen();
            $imagen->name = $request->name;
            $imagen->url = $rutita;
            $imagen->catalogo_id = $catalogo->id;
            $imagen->save();

        } catch (S3Exception $e) {
            return $e->getMessage() . "\n";
        }
        
        return redirect()->route('imagenes.index',compact('id'));
    }
}
