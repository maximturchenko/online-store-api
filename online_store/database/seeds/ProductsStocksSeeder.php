<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsStocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 

        DB::table('products_stocks')->insert([
            'product_id' => 1, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 2, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 3, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),    
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 4, 
            'stock_id' => 1,  
            'quantity' => rand(0, 15),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 5, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 6, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 7, 
            'stock_id' => 1,  
            'quantity' => rand(0, 44),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 8, 
            'stock_id' => 1,  
            'quantity' => 0,   
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 9, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 10, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 11, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 12, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 13, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),     
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 14, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 15, 
            'stock_id' => 1,  
            'quantity' => rand(0, 100),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 16, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 17, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),  
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 18, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),   
        ]);
        DB::table('products_stocks')->insert([
            'product_id' => 19, 
            'stock_id' => 1,  
            'quantity' => rand(0, 4),   
        ]);
 
    }
}
