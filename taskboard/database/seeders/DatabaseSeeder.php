<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $ana = User::create([ 
    'name' => 'Ana López', 
    'email' => 'ana@taskboard.test', 
    'password' => 'password123',   // el cast 'hashed' la cifra
    ]); 
    $carlos = User::create([ 
    'name' => 'Carlos Pérez', 
    'email' => 'carlos@taskboard.test', 
    'password' => 'password123', 
    ]); 

    $ana->comercios()->create(['nombre_comercio' => 'Café Amanecer', 'rubro' => 'Cafetería']); 
    $carlos->comercios()->create(['nombre_comercio' => 'Ferretería El Tornillo', 'rubro' =>
    'Ferretería']); 

    User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
