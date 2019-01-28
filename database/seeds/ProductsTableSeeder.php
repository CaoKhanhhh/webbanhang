<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $products = [];
        for($i = 0; $i < 100; $i++){
        	$item = [
        		'name' => $faker->name,
                'image' => $faker->imageUrl($width = 268, $height = 249, 'food'),
        		'cate_id' => rand(1, 8),
        		'price' => rand(10000, 999999),
        		'short_desc' => $faker->realText($maxNbChars = 200, $indexSize = 1),
        		'detail' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        		'star' => rand(1, 5)
        	];
        	array_push($products, $item);
        }
        DB::table('products')->insert($products);
    }
}
