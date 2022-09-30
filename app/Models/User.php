<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function telefonos(){
        $telefonos = Telefono::where('user_id',$this->id)->get();
        return $telefonos;
    }

    // Un usuario no puede ser los 3 a la vez, devuelve null si no es un tipo
    public function fotografo(){
        $fotografo = Fotografo::where('user_id',$this->id)->first();
        return $fotografo;
    }

    public function organizador(){
        $organizador = Organizador::where('user_id',$this->id)->first();
        return $organizador;
    }

    public function cliente(){
        $cliente = Cliente::where('user_id',$this->id)->first();
        return $cliente;
    }
    
}
