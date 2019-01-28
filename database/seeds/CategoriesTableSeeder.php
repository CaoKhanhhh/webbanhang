<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cates = [
        	['cate_name' => 'Đồ ăn'],
        	['cate_name' => 'Đồ uống'],
        	['cate_name' => 'Đồ ăn vặt'],
        	['cate_name' => 'Cơm trưa'],
            ['cate_name' => 'Tráng miệng'],
            ['cate_name' => 'Món chay'],
            ['cate_name' => 'Mì phở'],
        	['cate_name' => 'Bánh kem'],
        ];
        DB::table('categories')->insert($cates);
    }
}
