<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Pendidik',
            'identity_code' => '333721',
            'instansi' => 'Untirta',
            'email' => 'pendidik@gmail.com',
            'password' => bcrypt('123'),
            'auth' => 'pendidik',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pelajar',
            'identity_code' => '11111',
            'instansi' => 'Untirta',
            'email' => 'pelajar@gmail.com',
            'password' => bcrypt('321'),
            'auth' => 'pelajar',
        ]);
    }
}
