<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

     // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
        BookSeeder::class,
        CategorySeeder::class,
       ]);
       
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'Admin@domain.com',
            'password'=>Hash::make('password')
        ]);
    }
}
