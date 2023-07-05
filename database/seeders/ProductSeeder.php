<?php

namespace Database\Seeders;

use App\Models\Product;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{

    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $products = [
            [
                'name' => 'Apple',
                'description' => 'This is a fruit',
                'price' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Orange',
                'description' => 'This is a fruit',
                'price' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Grape',
                'description' => 'This is a fruit',
                'price' => 80,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Strawberry',
                'description' => 'This is a fruit',
                'price' => 90,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Banana',
                'description' => 'This is a fruit',
                'price' => 35,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lemonade',
                'description' => 'This is a fruit',
                'price' => 02,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Durain',
                'description' => 'This is a Queenfruit',
                'price' => 150,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        try {
            DB::transaction(function () use ($products) {
                Product::insert($products);
            });
        } catch (Exception $e) {
            throw $e;
        }
    }
}
