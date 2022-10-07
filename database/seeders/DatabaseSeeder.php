<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(TipoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TelefonoSeeder::class);
        $this->call(OrganizadorSeeder::class);
        $this->call(FotografoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(TipopagoSeeder::class);
        $this->call(TipoeventoSeeder::class);
        $this->call(EstadoeventoSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(ContratoSeeder::class);
        $this->call(EstadoinvitacionSeeder::class);
        $this->call(InvitacionSeeder::class);
        $this->call(ClienteContratoSeeder::class);
        

    }
}
