<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductGalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $images = [];
        $listProducts = Product::all();
        foreach($listProducts as $item){
            
            for($i = 0; $i < 6; $i++){
                $el = [
                    'img_url' => $faker->imageUrl($width = 84, $height = 84, 'food'),
                    'product_id' => $item->id
                ];
                $images[] = $el;
            }
        }
        DB::table('product_galleries')->insert($images);


    }
}