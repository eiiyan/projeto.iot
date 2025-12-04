<?php

namespace Database\Seeders;

use App\Models\Ambiente;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
             AmbienteSeeder::class,
             SensorSeeder::class,
             RegistroSeeder::class,

        ]);

         User::factory()->create([
            'name' => 'Test User1',
            'email' => 'test1@example.com',
            'password'=> Hash::make('123456')
        ]);

         User::factory()->create([
            'name' => 'Test User2',
            'email' => 'test2@example.com',
            'password'=> Hash::make('123456')
        ]);
         User::factory()->create([
            'name' => 'Test User3',
            'email' => 'test3@example.com',
            'password'=> Hash::make('123456')
        ]);

    }
}
