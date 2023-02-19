<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Level;
use App\Models\ItemCategory;
use App\Models\Officer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        Level::create([
            "level" => "Administrator"
        ]);
        
        Level::create([
            "level" => "Officer"
        ]);

        ItemCategory::create([
            'category' => "Smartphone",
        ]);

        ItemCategory::create([
            'category' => "Laptop",
        ]);

        Brand::create([
            'brand_name' => "Xiaomi"
        ]);
        
        Brand::create([
            'brand_name' => "Lenovo"
        ]);

        Officer::create([
            "officer_name" => "Apple",
            "username"     => "Appleee",
            "password"     => Hash::make("password"),
            "level_id"     => 1
        ]);
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
