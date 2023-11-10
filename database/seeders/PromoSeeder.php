<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
            'articleId' => 1,
            'userId'=>1,
            'video' => 'https://www.youtube.com/embed/sCyeRMqXwqI?si=U0ekUC0nt5RkgpTd',
        ]);
        DB::table('promotions')->insert([
            'articleId' => 2,
            'userId'=>1,
            'video' => 'https://www.youtube.com/embed/sCyeRMqXwqI?si=U0ekUC0nt5RkgpTd',
        ]);
        DB::table('promotions')->insert([
            'articleId' => 3,
            'userId'=>1,
            'video' => 'https://www.youtube.com/embed/sCyeRMqXwqI?si=U0ekUC0nt5RkgpTd',
        ]);
    }
}
