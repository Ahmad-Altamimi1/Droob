<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(Artical_typeSeeder::class);
        $this->call(ArticalSeeder::class);
        $this->call(imageSeeder::class);
        $this->call(PromoSeeder::class);
        
    }
}
