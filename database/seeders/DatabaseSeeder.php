<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(1)->create();
        \App\Models\Patients::factory(10)->create();

        \App\Models\Service::factory(10)->create();
        \App\Models\Doctor::factory(10)->create();
    }
}
