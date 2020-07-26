<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        //category 1 - Процессоры
        //category 2 - Видеокарты
        DB::table('products')->insert([
            'name' => "Процессор AMD Ryzen 5 2600, OEM", 
            'description' => "Сокет SocketAM4, ядер — 6",  
            'price' => 8390,  
            'category_id' => 1,  
        ]);
        DB::table('products')->insert([
            'name' => "Процессор INTEL Core i5 9400F, OEM", 
            'description' => "Сокет LGA 1151v2, ядер — 6",  
            'price' => 11990,  
            'category_id' => 1,  
        ]); 
        DB::table('products')->insert([
            'name' => "Процессор AMD Ryzen 3 3200G, OEM", 
            'description' => "Сокет SocketAM4, ядер — 4",  
            'price' => 6690,  
            'category_id' => 1,  
        ]); 
        DB::table('products')->insert([
            'name' => "Процессор INTEL Core i3 9100F, OEM", 
            'description' => "Сокет LGA 1151v2, ядер — 4",  
            'price' => 6190,  
            'category_id' => 1,  
        ]); 
        DB::table('products')->insert([
            'name' => "Процессор AMD Ryzen 7 2700, TRAY", 
            'description' => "Сокет SocketAM4, ядер — 8",  
            'price' => 12290,  
            'category_id' => 1,  
        ]); 
        DB::table('products')->insert([
            'name' => "Процессор INTEL Pentium Gold G5400, BOX", 
            'description' => "Сокет  LGA 1151v2, ядер — 2",  
            'price' => 4790,  
            'category_id' => 1,  
        ]); 
        DB::table('products')->insert([
            'name' => "Процессор AMD Ryzen 5 3600X, TRAY", 
            'description' => "Сокет SocketAM4, ядер — 6",  
            'price' => 16390,  
            'category_id' => 1,  
        ]); 
        DB::table('products')->insert([
            'name' => "Процессор AMD Ryzen 5 3500, OEM", 
            'description' => "Сокет SocketAM4, ядер — 6",  
            'price' => 9790,  
            'category_id' => 1,  
        ]); 
        DB::table('products')->insert([
            'name' => "Процессор AMD Ryzen 3 1200, OEM", 
            'description' => "Сокет SocketAM4, ядер — 4",  
            'price' => 3690,  
            'category_id' => 1,  
        ]); 
        DB::table('products')->insert([
            'name' => "Процессор AMD Ryzen 7 3700X, TRAY", 
            'description' => "Сокет SocketAM4, ядер — 8",  
            'price' => 23690,  
            'category_id' => 1,  
        ]);
        
        DB::table('products')->insert([
            'name' => "Видеокарта SAPPHIRE AMD Radeon RX 580", 
            'description' => "Объём видеопамяти: 8ГБ",  
            'price' => 17990,  
            'category_id' => 2,  
        ]); 
        DB::table('products')->insert([
            'name' => "Видеокарта GIGABYTE nVidia GeForce GTX 1660", 
            'description' => "Объём видеопамяти: 6ГБ",  
            'price' => 17740,  
            'category_id' => 2,  
        ]);  
        DB::table('products')->insert([
            'name' => "Видеокарта GIGABYTE nVidia GeForce GTX 1660SUPER", 
            'description' => "Объём видеопамяти: 6ГБ",  
            'price' => 18660,  
            'category_id' => 2,  
        ]);  
        DB::table('products')->insert([
            'name' => "Видеокарта MSI nVidia GeForce GTX 1050TIR", 
            'description' => "Объём видеопамяти: 4ГБ",  
            'price' => 13100,  
            'category_id' => 2,  
        ]);  
        DB::table('products')->insert([
            'name' => "Видеокарта GIGABYTE nVidia GeForce RTX 2070SUPER", 
            'description' => "Объём видеопамяти: 8ГБ",  
            'price' => 41840,  
            'category_id' => 2,  
        ]); 
        DB::table('products')->insert([
            'name' => "Видеокарта PALIT nVidia GeForce GTX 1650SUPER", 
            'description' => "Объём видеопамяти: 4ГБ",  
            'price' => 13800,  
            'category_id' => 2,  
        ]);   
        DB::table('products')->insert([
            'name' => "Видеокарта MSI nVidia GeForce RTX 2060SUPER", 
            'description' => "Объём видеопамяти: 8ГБ",  
            'price' => 32090,  
            'category_id' => 2,  
        ]); 
        DB::table('products')->insert([
            'name' => "Видеокарта GIGABYTE nVidia GeForce GT 710", 
            'description' => "Объём видеопамяти: 2ГБ",  
            'price' => 3380,  
            'category_id' => 2,  
        ]); 
        DB::table('products')->insert([
            'name' => "Видеокарта GIGABYTE nVidia GeForce RTX 2070SUPER", 
            'description' => "Объём видеопамяти: 8ГБ",  
            'price' => 43120,  
            'category_id' => 2,  
        ]); 
 
    }
}
