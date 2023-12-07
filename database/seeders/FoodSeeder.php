<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = database_path('foods.csv');
        $foods = array_map('str_getcsv', file($csvFile));

        foreach ($foods as $food) {
            DB::table('foods')->insert([
                'product' => $food[0],
                'fat_100g' => $food[1],
                'protein_100g' => $food[2],
                'carbs_100g' => $food[3],
                'calories_100g' => $food[4],  
                'created_at' => now(),
                'updated_at' => now(),
                
            ]);
        }
    }
}
