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
        DB::table('products')->insert([
            [
                'name' => 'エチオピア シダモ G1',
                'description' => 'フローラルで複雑なアロマ、ジューシーな酸味を持つ。',
                'image' => 'images/istockphoto-1144462790-612x612.jpg',
                'price' => '1200'
            ],
            [
                'name' => 'ケニア AA1',
                'description' => 'ベリーのような風味と酸味、濃厚なボディ。',
                'image' => 'images/istockphoto-611317846-612x612.jpg',
                'price' => '1200',
            ],
            [
                'name' => 'グアテマラ アンティグア',
                'description' => 'チョコレートのような甘さとスムースなボディ。',
                'image' => 'images/istockphoto-1165302066-612x612.jpg',
                'price' => '1200'
            ],
            [
                'name' => 'ブルンジ AA',
                'description' => '赤い果実の風味とキレのある酸味。',
                'image' => 'images/istockphoto-182501254-612x612.jpg',
                'price' => '1200'
            ],
            [
                'name' => 'コロンビア ウイラ',
                'description' => 'バランスの良い酸味と甘さ、ナッツの風味。',
                'image' => 'images/istockphoto-1142886708-612x612.jpg',
                'price' => '1200'
            ],
            [
                'name' => 'ブラジル サントス',
                'description' => 'ローストナッツのような甘さ、低酸味。',
                'image' => 'images/istockphoto-477708131-612x612.jpg',
                'price' => '1200'
            ],
            [
                'name' => 'モーニングブレンド',
                'description' => 'さわやかな酸味と軽いボディで、朝のスタートにぴったりなブレンド。',
                'image' => 'images/Morning_brend_L_070002_50890.jpg',
                'price' => '1000'
            ],
            [
                'name' => 'ディープリッチブレンド',
                'description' => 'タンザニアサウステラのフルーティな酸味と、ケニアマサイの濃厚なコクが調和したブレンド。',
                'image' => 'images/Deep_Rich_Brend_L_070002_50890.jpg',
                'price' => '1000'
            ],
            [
                'name' => 'グアテマラ アンティグア',
                'description' => 'チョコレートのような甘さとスムースなボディ。',
                'image' => 'images/Etiopia_Single_Origin_L_070002_50890.jpg.png',
                'price' => '1000'
            ],

        ]);
    }
}
