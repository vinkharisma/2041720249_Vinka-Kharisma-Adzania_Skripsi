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
        // User::create([
        //     'name' => "Super Admin",
        //     'email' => "superadmin@gmail.com",
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'no_pegawai' => "T24",
        //     'departemen' => "Pergudangan",
        //     'no_hp' => "08123456789",
        // ]);
        User::create([
            'name' => "Vice President",
            'email' => "vp@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'no_pegawai' => "T24",
            'departemen' => "Pergudangan",
            'no_hp' => "08123456789",
        ]);
        User::create([
            'name' => "Production Planning and Inventory Control",
            'email' => "ppic@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'no_pegawai' => "T24",
            'departemen' => "Pergudangan",
            'no_hp' => "08123456789",
        ]);
        // User::create([
        //     'name' => "Admin",
        //     'email' => "admin@gmail.com",
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'no_pegawai' => "T24",
        //     'departemen' => "Pergudangan",
        //     'no_hp' => "08123456789",
        // ]);

        // User::factory()->count(10)->create();
    }
}
