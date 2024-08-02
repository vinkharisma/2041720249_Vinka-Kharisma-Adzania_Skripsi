<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions (database/seeders/MenuGroupSeeder)
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'data.management']);
        Permission::create(['name' => 'prediction.management']);
        Permission::create(['name' => 'user.management']);
        Permission::create(['name' => 'role.permission.management']);
        Permission::create(['name' => 'menu.management']);

        // Data Palet
        Permission::create(['name' => 'data.index']);
        Permission::create(['name' => 'data.create']);
        Permission::create(['name' => 'data.edit']);
        Permission::create(['name' => 'data.destroy']);
        Permission::create(['name' => 'data.import']);
        Permission::create(['name' => 'data.export']);

        // Data Palet Terpakai
        Permission::create(['name' => 'palet-terpakai.index']);
        Permission::create(['name' => 'palet-terpakai.create']);
        Permission::create(['name' => 'palet-terpakai.edit']);
        Permission::create(['name' => 'palet-terpakai.destroy']);
        Permission::create(['name' => 'palet-terpakai.import']);
        Permission::create(['name' => 'palet-terpakai.export']);

        // Data Palet Kosong
        Permission::create(['name' => 'palet-kosong.index']);
        Permission::create(['name' => 'palet-kosong.create']);
        Permission::create(['name' => 'palet-kosong.edit']);
        Permission::create(['name' => 'palet-kosong.destroy']);
        Permission::create(['name' => 'palet-kosong.import']);
        Permission::create(['name' => 'palet-kosong.export']);

        // Prediction Algorithm
        Permission::create(['name' => 'algorithm.index']);
        Permission::create(['name' => 'algorithm.create']);
        Permission::create(['name' => 'algorithm.edit']);
        Permission::create(['name' => 'algorithm.destroy']);
        Permission::create(['name' => 'algorithm.import']);
        Permission::create(['name' => 'algorithm.export']);

        // Prediction Result
        Permission::create(['name' => 'result.index']);
        Permission::create(['name' => 'result.create']);
        Permission::create(['name' => 'result.edit']);
        Permission::create(['name' => 'result.destroy']);
        Permission::create(['name' => 'result.import']);
        Permission::create(['name' => 'result.export']);

        // User
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.destroy']);
        Permission::create(['name' => 'user.import']);
        Permission::create(['name' => 'user.export']);

        // Role List
        Permission::create(['name' => 'role.index']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.edit']);
        Permission::create(['name' => 'role.destroy']);
        Permission::create(['name' => 'role.import']);
        Permission::create(['name' => 'role.export']);

        // Permission List
        Permission::create(['name' => 'permission.index']);
        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permission.edit']);
        Permission::create(['name' => 'permission.destroy']);
        Permission::create(['name' => 'permission.import']);
        Permission::create(['name' => 'permission.export']);

        // Assign Permission To Role
        Permission::create(['name' => 'assign.index']);
        Permission::create(['name' => 'assign.create']);
        Permission::create(['name' => 'assign.edit']);
        Permission::create(['name' => 'assign.destroy']);

        // Assign User To Role
        Permission::create(['name' => 'assign.user.index']);
        Permission::create(['name' => 'assign.user.create']);
        Permission::create(['name' => 'assign.user.edit']);

        // Menu group
        Permission::create(['name' => 'menu-group.index']);
        Permission::create(['name' => 'menu-group.create']);
        Permission::create(['name' => 'menu-group.edit']);
        Permission::create(['name' => 'menu-group.destroy']);

        // Menu item
        Permission::create(['name' => 'menu-item.index']);
        Permission::create(['name' => 'menu-item.create']);
        Permission::create(['name' => 'menu-item.edit']);
        Permission::create(['name' => 'menu-item.destroy']);

        // Create Roles Super Admin
        // $role = Role::create(['name' => 'super-admin']);
        // $role->givePermissionTo(Permission::all());
        // $role->givePermissionTo([
        //     'dashboard', 'user.management', 'role.permission.management',' menu.management', 'data.management', 'prediction.management',
        //     'data.index', 'data.create', 'data.edit', 'data.destroy', 'data.import', 'data.export',
        //     'palet-terpakai.index', 'palet-terpakai.create', 'palet-terpakai.edit', 'palet-terpakai.destroy', 'palet-terpakai.import', 'palet-terpakai.export',
        //     'palet-kosong.index', 'palet-kosong.create', 'palet-kosong.edit', 'palet-kosong.destroy', 'palet-kosong.import', 'palet-kosong.export',
        //     'user.index', 'user.create', 'user.edit', 'user.destroy', 'user.import', 'user.export',
        //     'role.index', 'role.create', 'role.edit', 'role.destroy', 'role.import', 'role.export',
        //     'permission.index', 'permission.create', 'permission.edit', 'permission.destroy', 'permission.import', 'permission.export',
        //     'assign.index', 'assign.create', 'assign.edit', 'assign.destroy', 'assign.user.index', 'assign.user.create', 'assign.user.edit',
        //     'menu-group.index', 'menu-group.create', 'menu-group.edit', 'menu-group.destroy',
        //     'menu-item.index', 'menu-item.create', 'menu-item.edit', 'menu-item.destroy',
        //     'prediction.index', 'prediction.create', 'prediction.edit', 'prediction.destroy', 'prediction.import', 'prediction.export'
        // ]);

        // Create Roles User (VP)
        $roleUser = Role::create(['name' => 'vp']);
        $roleUser->givePermissionTo([
            'dashboard',
        ]);

        // Create Roles User (PPIC)
        $rolePPIC = Role::create(['name' => 'ppic']);
        $rolePPIC->givePermissionTo([
            'dashboard', 'user.management', 'data.management', 'prediction.management',
            'data.index', 'data.create', 'data.edit', 'data.destroy', 'data.import', 'data.export',
            // 'palet-kosong.index', 'palet-kosong.create', 'palet-kosong.edit', 'palet-kosong.destroy', 'palet-kosong.import', 'palet-kosong.export',
            // 'palet-terpakai.index', 'palet-terpakai.create', 'palet-terpakai.edit', 'palet-terpakai.destroy', 'palet-terpakai.import', 'palet-terpakai.export',
            // 'algorithm.index', 'algorithm.create', 'algorithm.edit', 'algorithm.destroy', 'algorithm.import', 'algorithm.export',
            'result.index', 'result.create', 'result.edit', 'result.destroy', 'result.import', 'result.export',
            'user.index', 'user.create', 'user.edit', 'user.destroy', 'user.import', 'user.export',
        ]);

        // Create Admin
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo([
            'dashboard',
            'data.management',
            'data.index'
        ]);

        // Assign user id 1 ke Super Admin
        // $user = User::find(1);
        // $user->assignRole('super-admin');
        $user = User::find(1);
        $user->assignRole('vp');
        $user = User::find(2);
        $user->assignRole('ppic');
        // $user = User::find(4);
        // $user->assignRole('admin');
    }
}
