<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "SuperAdmin",
            'email' => "superadmin@gmail.com",
            'password' => Hash::make('password'),
            'no_pegawai' => "T24",
            'departemen' => "Pergudangan",
            'no_hp' => "0812344",
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => "user",
            'email' => "user@gmail.com",
            'password' => Hash::make('password'),
            'no_pegawai' => "T24",
            'departemen' => "Pergudangan",
            'no_hp' => "0832753",
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('password'),
            'no_pegawai' => "T24",
            'departemen' => "Pergudangan",
            'no_hp' => "08392734",
            'email_verified_at' => now(),
        ]);

        // User::factory()->count(10)->create();
    }
}
