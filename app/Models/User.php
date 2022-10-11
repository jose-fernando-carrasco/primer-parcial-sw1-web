<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipoCuenta'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

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

    public function getRol(){
        $rolcito = "";
        switch ($this->tipoCuenta) {
            case 1: $rolcito = "Organizador";
                    break;
            case 2: $rolcito = "Fotografo";
                    break;
            case 3: $rolcito = "Cliente";
                    break;
        }
       return $rolcito;
    }

    public function Imagenperfil1(){
        $imagen1 = Imagenperfil::where('user_id',$this->id)->first();
        return $imagen1;
    }

    public function TengoImagenP(){
        $imagen1 = Imagenperfil::where('user_id',$this->id)->get();
        if(count($imagen1) == 0){
            return false;
        }
        return true;
    }

    public function procentajeFotosPerfil(){
        $imagen1 = Imagenperfil::where('user_id',$this->id)->get();
        $por = "0%";
        switch (count($imagen1)) {
            case 0: $por = "0%";
                    break;
            case 1: $por = "33%";
                    break;
            case 2: $por = "66%";
                    break;
            case 3: $por = "100%";
                    break;        
        }
        if(count($imagen1) >=3)
           $por = "100%";

        return $por;
    }
}
