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
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        \App\Models\User::create([
            'username' => 'FajrArf',
            'email' => 'budimanfajar660@gmail.com',
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::factory(3)->create();
        \App\Models\Category::create([
            "name" => "Book",
            "slug" => "book"
        ]);
        \App\Models\Category::create([
            "name" => "Handphone",
            "slug" => "handphone"
        ]);
        \App\Models\Category::create([
            "name" => "Food",
            "slug" => "Food"
        ]);
        \App\Models\Product::factory(20)->create();
    }
}
