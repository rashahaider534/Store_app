<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->insert([[
            'name' => 'Food',
            'image' => 'assets\img\f.jpeg',
            'description' => '',
        ],
        [
            'name' => 'Makeup',
            'image' => 'assets\img\m.jpeg',
            'description' => '',
        ],
        [
            'name' => 'Bags',
            'image' => 'assets\img\b.jpeg',
            'description' => '',
        ],
        [
            'name' => 'Clothes',
            'image' => 'assets\img\c.jpeg',
            'description' => '',
        ]]
    );
    }
}
