<?php

namespace Database\Seeders;
use  Illuminate\Database\QueryException ;
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
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
            'name' => 'Admin User', 
            'email' => 'admin@comp3385.com',
            'password' => Hash::make('password'), // Set the password here
     ]);
    }
}
