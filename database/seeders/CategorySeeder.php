<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $categories = [
            ['name' => 'diy'],
            ['name' => 'bedroom'],
            ['name' => 'scandinavian interior'],
            ['name' => 'outdoor'],
            ['name' => 'nordic interior'],
            ['name' => 'makeover'],
            ['name' => 'kitchen'],
            ['name' => 'video'],
            ['name' => 'living room'],
            ['name' => 'upcycle'],
            ['name' => 'kids room'],
            ['name' => 'styling']
        ];
        DB::table('categories')->insert($categories);
    }
}
