<?php

namespace App\Actions\Fortify;

use App\Models\Cliente;
use App\Models\Fotografo;
use App\Models\Organizador;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        
         Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $rolcito = "";
        switch ($input['tipoCuenta']) {
            case 1: $rolcito = "Organizador";
                    break;
            case 2: $rolcito = "Fotografo";
                    break;
            case 3: $rolcito = "Cliente";
                    break;
        }
        $UserX = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'tipoCuenta' => $input['tipoCuenta'],
            'password' => Hash::make($input['password']),
        ])->assignRole($rolcito); 
        
        if($input['tipoCuenta'] == "2"){// == 2
            $fotografoX = new Fotografo();
            $fotografoX->user_id = $UserX->id;
            $fotografoX->save(); 
        }else{  // == 1
            if($input['tipoCuenta'] == "1"){
                $OrganizadorX = new Organizador();
                $OrganizadorX->user_id = $UserX->id;
                $OrganizadorX->save();
            }else{// == 3
                $ClienteX = new Cliente();
                $ClienteX->user_id = $UserX->id;
                $ClienteX->save();
            }
           
        } 

       return $UserX;
    }
}
