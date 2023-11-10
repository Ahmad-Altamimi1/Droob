<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class imageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'created_at' => '2023-11-10 14:34:56',
            'articleId' => 1,
            'image' => 'https://doroobgroup.com/storage/uploads/CQABgGDbLfIKkD4qDyFEtpWkMFxKGmDZCJMSBztV.png',
        ]);
    }
}
