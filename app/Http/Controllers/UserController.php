<?php

namespace App\Http\Controllers;

use App\Models\Imagenperfil;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::where('eliminado',false)->get();
        return view('users.index',compact('users'));
    }

    public function show($id){
        $user = User::find($id);
        $fotos = Imagenperfil::where('user_id',$id)->get();
        $cantFotos = count($fotos );
        return view('users.show',compact('user','fotos','cantFotos'));
    }

    public function eliminar($id){
        $user = User::find($id);
        $user->eliminado = true;
        $user->update();
        return redirect()->route('users.index');
    }
}
