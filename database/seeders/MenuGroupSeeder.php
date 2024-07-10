<?php

namespace Database\Seeders;

use App\Models\MenuGroup;
use Illuminate\Database\Seeder;

class MenuGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // MenuGroup::factory()->count(5)->create();
        MenuGroup::insert(
            [
                // Dashboard
                [
                    'name' => 'Dashboard',
                    // 'icon' => 'fas fa-tachometer-alt',
                    'icon' => 'fas fa-chart-line',
                    'permission_name' => 'dashboard',
                ],
                // Data Management
                [
                    'name' => 'Data Management',
                    'icon' => 'fas fa-table',
                    'permisison_name' => 'data.management',
                ],
                // Prediction Management
                [
                    'name' => 'Prediction Management',
                    'icon' => 'fas fa-chart-bar',
                    'permisison_name' => 'prediction.management',
                ],
                // Users Management
                [
                    'name' => 'Users Management',
                    'icon' => 'fas fa-users',
                    'permission_name' => 'user.management',
                ],
                // Role Management
                [
                    'name' => 'Role Management',
                    'icon' => 'fas fa-user-tag',
                    'permisison_name' => 'role.permission.management',
                ],
                // Menu Management
                [
                    'name' => 'Menu Management',
                    'icon' => 'fas fa-bars',
                    'permisison_name' => 'menu.management',
                ],
            ]
        );
    }
}
