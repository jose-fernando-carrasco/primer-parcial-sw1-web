<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orga = Role::create(['name' => 'Organizador']);
        $foto = Role::create(['name' => 'Fotografo']);
        $clie = Role::create(['name' => 'Cliente']);
        $admi = Role::create(['name' => 'Admin']);

        /* Permisos de Administrador */
        Permission::create(['name' => 'users.index'])->syncRoles([$admi]);

        /* Permisos de Organizador */
        Permission::create(['name' => 'contratos.create'])->syncRoles([$orga]);
        Permission::create(['name' => 'contratos.index'])->syncRoles([$orga,$foto]);
        Permission::create(['name' => 'eventos.index'])->syncRoles([$orga]);
        
        /* Permisos de Fotografos */
        Permission::create(['name' => 'catalogos.index'])->syncRoles([$foto,$orga,$clie]);
        Permission::create(['name' => 'catalogos.store'])->syncRoles([$foto]);
        Permission::create(['name' => 'imagenes.store'])->syncRoles([$foto]);

        /* Permisos Clientes */
        Permission::create(['name' => 'eventos.indexcliente'])->syncRoles([$clie]);
        Permission::create(['name' => 'invitaciones.index'])->syncRoles([$clie]);
        
    }
}
