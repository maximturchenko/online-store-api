<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => "Процессоры",  
        ]);
        DB::table('categories')->insert([
            'name' => "Видеокарты",  
        ]);
        DB::table('categories')->insert([
            'name' => "Материнские платы",  
        ]);
    }
}
