<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
            [
                [
                    'name'=>'dress',
                    'quantity'=>20,
                    'price'=>500,
                    'image'=>'assets\img\c2.jpeg',
                    'shop_id'=>4
                ],
                [
                    'name'=>'pants',
                    'quantity'=>40,
                    'price'=>1000,
                    'image'=>'assets\img\c1.jpeg',
                    'shop_id'=>4
                ],
                [
                    'name'=>'skirt',
                    'quantity'=>70,
                    'price'=>1500,
                    'image'=>'assets\img\c3.jpeg',
                    'shop_id'=>4
                ],
                [
                    'name'=>'T-shert',
                    'quantity'=>10,
                    'price'=>350,
                    'image'=>'assets\img\c4.jpeg',
                    'shop_id'=>4
                ],


                [
                    'name'=>'Hamburger',
                    'quantity'=>67,
                    'price'=>1050,
                    'image'=>'assets\img\f3.jpeg',
                    'shop_id'=>1
                ],
                [
                    'name'=>'Pizza',
                    'quantity'=>20,
                    'price'=>550,
                    'image'=>'assets\img\f2.jpeg',
                    'shop_id'=>1
                ],
                [
                    'name'=>'Salad',
                    'quantity'=>10,
                    'price'=>50,
                    'image'=>'assets\img\f4.jpeg',
                    'shop_id'=>1
                ],
                [
                    'name'=>'Grilled Chicken',
                    'quantity'=>30,
                    'price'=>50,
                    'image'=>'assets\img\f1.jpeg',
                    'shop_id'=>1
                ],

                [
                    'name'=>'hand bag',
                    'quantity'=>30,
                    'price'=>400,
                    'image'=>'assets\img\b3.jpeg',
                    'shop_id'=>3
                ],
                [
                    'name'=>'school bag',
                    'quantity'=>10,
                    'price'=>200,
                    'image'=>'assets\img\b2.jpeg',
                    'shop_id'=>3
                ],
                [
                    'name'=>'laptop bag',
                    'quantity'=>8,
                    'price'=>100,
                    'image'=>'assets\img\b1.jpeg',
                    'shop_id'=>3
                ],
                [
                    'name'=>'travel bag',
                    'quantity'=>9,
                    'price'=>700,
                    'image'=>'assets\img\b4.jpeg',
                    'shop_id'=>3
                ],

                [
                    'name'=>'Foundation',
                    'quantity'=>5,
                    'price'=>900,
                    'image'=>'assets\img\m3.jpeg',
                    'shop_id'=>2
                ],
                [
                    'name'=>'red roge',
                    'quantity'=>13,
                    'price'=>50,
                    'image'=>'assets\img\m1.jpeg',
                    'shop_id'=>2
                ],
                [
                    'name'=>'eyeliner',
                    'quantity'=>9,
                    'price'=>80,
                    'image'=>'assets\img\m2.jpeg',
                    'shop_id'=>2
                ],
                [
                    'name'=>'eyeshadow',
                    'quantity'=>2,
                    'price'=>850,
                    'image'=>'assets\img\m4.jpeg',
                    'shop_id'=>2
                ],


            ]
        );
    }
}
