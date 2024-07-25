<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // MenuItem::factory()->count(10)->create();
        MenuItem::insert(
            [
                // Dashboard
                [
                    'name' => 'Dashboard',
                    'route' => 'dashboard',
                    'permission_name' => 'dashboard',
                    'menu_group_id' => 1,
                ],

                // Data
                [
                    'name' => 'Stok Data List',
                    'route' => 'data-management/data',
                    'permission_name' => 'data.index',
                    'menu_group_id' => 2,
                ],
                [
                    'name' => 'Kosong',
                    'route' => 'data-management/palet-kosong',
                    'permission_name' => 'palet-kosong.index',
                    'menu_group_id' => 2,
                ],
                [
                    'name' => 'Terpakai',
                    'route' => 'data-management/palet-terpakai',
                    'permission_name' => 'palet-terpakai.index',
                    'menu_group_id' => 2,
                ],

                // Prediction
                [
                    'name' => 'Prediction Algorithm',
                    'route' => 'prediction-management/algorithm',
                    'permission_name' => 'algorithm.index',
                    'menu_group_id' => 3,
                ],
                [
                    'name' => 'Prediction Result',
                    'route' => 'prediction-management/result',
                    'permission_name' => 'result.index',
                    'menu_group_id' => 3,
                ],

                // User List
                [
                    'name' => 'User List',
                    'route' => 'user-management/user',
                    'permission_name' => 'user.index',
                    'menu_group_id' => 4,
                ],

                // Role List
                [
                    'name' => 'Role List',
                    'route' => 'role-and-permission/role',
                    'permission_name' => 'role.index',
                    'menu_group_id' => 5,
                ],
                // Permission List
                [
                    'name' => 'Permission List',
                    'route' => 'role-and-permission/permission',
                    'permission_name' => 'permission.index',
                    'menu_group_id' => 5,
                ],
                // Permission To Role
                [
                    'name' => 'Permission To Role',
                    'route' => 'role-and-permission/assign',
                    'permission_name' => 'assign.index',
                    'menu_group_id' => 5,
                ],
                // User To Role
                [
                    'name' => 'User To Role',
                    'route' => 'role-and-permission/assign-user',
                    'permission_name' => 'assign.user.index',
                    'menu_group_id' => 5,
                ],

                // Menu Group
                [
                    'name' => 'Menu Group',
                    'route' => 'menu-management/menu-group',
                    'permission_name' => 'menu-group.index',
                    'menu_group_id' => 6,
                ],
                // Menu Item
                [
                    'name' => 'Menu Item',
                    'route' => 'menu-management/menu-item',
                    'permission_name' => 'menu-item.index',
                    'menu_group_id' => 6,
                ],
            ]
        );
    }
}
