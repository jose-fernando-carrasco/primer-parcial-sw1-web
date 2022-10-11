<?php

namespace App\Http\Controllers;

use App\Models\Imagenperfil;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenperfilController extends Controller
{
    public function store(Request $request){
        $request->validate(['name' => 'required']);
        try {
            /* return $request; */
            $s3Client = new S3Client([
                'version' => 'latest',
                'region'  => 'us-east-1'
            ]);
            
            $Directorio = 'Perfiles/'.auth()->user()->name.'/';
            Storage::disk('s3')->makeDirectory($Directorio);
            $rutita = 'https://mycontenedor23.s3.amazonaws.com/'.$Directorio.$request->file('file')->getClientOriginalName();
            
            $result = $s3Client->putObject([
                'Bucket' => 'mycontenedor23',
                'Key' => $Directorio.$request->file('file')->getClientOriginalName(),
                'Body'   => fopen($request->file('file')->getPathName(), 'r'),
                'ACL'    => 'public-read',
            ]);
            
            $imagen = new Imagenperfil();
            $imagen->name = $request->name;
            $imagen->url = $rutita;
            $imagen->user_id = $request->user_id;
            $imagen->save();

        } catch (S3Exception $e) {
            return $e->getMessage() . "\n";
        }
        $id = $request->user_id;
        return redirect()->route('users.show',$id);
    }
}
