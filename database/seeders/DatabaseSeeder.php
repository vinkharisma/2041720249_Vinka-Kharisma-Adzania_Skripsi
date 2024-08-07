<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            DataSeeder::class,
            DataTerpakaiSeeder::class,
            DataKosongSeeder::class,
            PredictionSeeder::class,
            ResultSeeder::class,
            UserSeeder::class,
            RoleAndPermissionSeeder::class,
            MenuGroupSeeder::class,
            MenuItemSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
