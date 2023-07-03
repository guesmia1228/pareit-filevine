<?php

namespace Database\Seeders;

use App\Models\UserWebsite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWebsiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserWebsite::factory(20)->create();
    }
}
