<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
             [
                 'name' => 'りんご',
                 'description' => 'とても美味しいりんごです',
                 'image' => '/images/1.jpg',
                 'price' =>'4500'
             ],
             [
                 'name' => 'マスカット',
                 'description' => '宝石のようなマスカット',
                 'image' => '/images/2.jpg',
                 'price' =>'4500'
             ],
             [
                 'name' => 'マスクメロン',
                 'description' => '果物の王　マスクメロンです',
                 'image' => '/images/3.jpg',
                 'price' =>'6800'
             ],
             [
                 'name' => '夕張メロン',
                 'description' => '夕張メロンです',
                 'image' => '/images/4.jpg',
                 'price' =>'4500'
             ],
             [
                 'name' => 'ぶどう',
                 'description' => '甘さ控えめ　大人の味のぶどうです',
                 'image' => '/images/5.jpg',
                 'price' =>'4500'
             ],
             [
                 'name' => '桃',
                 'description' => '甘い桃です',
                 'image' => '/images/6.jpg',
                 'price' =>'4500'
             ],
             [
                 'name' => 'みかん',
                 'description' => 'みかんです',
                 'image' => '/images/7.jpg',
                 'price' =>'6800'
             ],
             [
                 'name' => 'りんご',
                 'description' => '山梨県産のりんごです',
                 'image' => '/images/8.jpg',
                 'price' =>'7800'
             ],
             [
                 'name' => 'いちご',
                 'description' => '甘酸っぱさがたまらない！　いちごです',
                 'image' => '/images/9.jpg',
                 'price' =>'4500'
             ],
         ]);
    }
}
