<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Artical_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_types')->insert([
            'type' => 'أسلاميات',
            'description' => ' ',
            'image' => '',
        ]);
    }
}
