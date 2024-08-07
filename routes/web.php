<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DataPaletKosongController;
use App\Http\Controllers\DataPaletTerpakaiController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\Menu\MenuGroupController;
use App\Http\Controllers\Menu\MenuItemController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoleAndPermission\AssignPermissionController;
use App\Http\Controllers\RoleAndPermission\AssignUserToRoleController;
use App\Http\Controllers\RoleAndPermission\ExportPermissionController;
use App\Http\Controllers\RoleAndPermission\ExportRoleController;
use App\Http\Controllers\RoleAndPermission\ImportPermissionController;
use App\Http\Controllers\RoleAndPermission\ImportRoleController;
use App\Http\Controllers\RoleAndPermission\PermissionController;
use App\Http\Controllers\RoleAndPermission\RoleController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\DataPaletKosong;
use App\Models\DataPaletTerpakai;
use DebugBar\DataCollector\DataCollector;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::group(['middleware' => ['auth', 'verified']], function () {

    // Dashboard
    // Route::get('/dashboard', function () {
    //     return view('dashboard', ['users' => User::get(),]);
    // });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.index');
    // Route::put('/dashboard/profile', [UserController::class, 'updateProfile'])->name('profile.update');

    // Data Management
    Route::prefix('data-management')->group(function () {
        Route::resource('data', DataController::class);
        Route::get('export', [DataController::class, 'export'])->name('data.export');
        Route::post('import', [DataController::class, 'import'])->name('data.import');
        // Route::get('export', [DataController::class, 'export'])->name('palet-terpakai.export');

        // Route::resource('palet-terpakai', DataPaletTerpakaiController::class);
        // // Route::get('palet-terpakai/export', [DataPaletTerpakaiController::class, 'export'])->name('palet-terpakai.export');
        // Route::post('palet-terpakai/import', [DataPaletTerpakaiController::class, 'import'])->name('palet-terpakai.import');

        // Route::resource('palet-kosong', DataPaletKosongController::class);
        // // Route::get('palet-kosong/export', [DataPaletKosongController::class, 'export'])->name('palet-kosong.export');
        // Route::post('palet-kosong/import', [DataPaletKosongController::class, 'import'])->name('palet-kosong.import');
    });

    // Prediction
    Route::get('/prediction/{type}', [PredictionController::class, 'index'])->name('datas.prediction');
    // Route::get('/prediction', [PredictionController::class, 'index'])->name('prediction.index');

    // User Management
    Route::prefix('user-management')->group(function () {
        Route::resource('user', UserController::class);
        Route::post('import', [UserController::class, 'import'])->name('user.import');
        Route::get('export', [UserController::class, 'export'])->name('user.export');
        Route::get('demo', DemoController::class)->name('user.demo');
    });

    // Role Management
    Route::group(['prefix' => 'role-and-permission'], function () {
        // Role List
        Route::resource('role', RoleController::class);
        Route::get('role/export', ExportRoleController::class)->name('role.export');
        Route::post('role/import', ImportRoleController::class)->name('role.import');

        // Permission List
        Route::resource('permission', PermissionController::class);
        Route::get('permission/export', ExportPermissionController::class)->name('permission.export');
        Route::post('permission/import', ImportPermissionController::class)->name('permission.import');

        // Assign Permission To Role
        Route::get('assign', [AssignPermissionController::class, 'index'])->name('assign.index');
        Route::get('assign/create', [AssignPermissionController::class, 'create'])->name('assign.create');
        Route::get('assign/{role}/edit', [AssignPermissionController::class, 'edit'])->name('assign.edit');
        Route::put('assign/{role}', [AssignPermissionController::class, 'update'])->name('assign.update');
        Route::post('assign', [AssignPermissionController::class, 'store'])->name('assign.store');

        // Assign User To Role
        Route::get('assign-user', [AssignUserToRoleController::class, 'index'])->name('assign.user.index');
        Route::get('assign-user/create', [AssignUserToRoleController::class, 'create'])->name('assign.user.create');
        Route::post('assign-user', [AssignUserToRoleController::class, 'store'])->name('assign.user.store');
        Route::get('assing-user/{user}/edit', [AssignUserToRoleController::class, 'edit'])->name('assign.user.edit');
        Route::put('assign-user/{user}', [AssignUserToRoleController::class, 'update'])->name('assign.user.update');
    });

    // Menu Management
    Route::prefix('menu-management')->group(function () {
        // Menu Group
        Route::resource('menu-group', MenuGroupController::class);
        // Menu Item
        Route::resource('menu-item', MenuItemController::class);
    });

    // Prediction Management
    // Route::resource('prediction', PredictionController::class);

    // // // Test
    // Route::prefix('prediction-management')->group(function () {
    //     // Prediction Management
    //     Route::resource('prediction', PredictionController::class);
    //     // Route::get('prediction', [PredictionController::class, 'index'])->name('predictions.index');
    // });

    // Route::get('/prediction-management/prediction', function () {
    //     return view('predictions.index');
    // });

    // // Prediction Management
    // Route::prefix('prediction-management')->group(function () {
    //     Route::get('prediction', [PredictionController::class, 'index'])->name('algorithms.index');
    //     Route::get('result', [PredictionController::class, 'result'])->name('result.index');
    // });

    // Prediction Management
    Route::prefix('prediction-management')->group(function () {
        Route::get('algorithm', function () {
            return view('predictions.index');
        })->name('predictions.index');

        Route::get('result', [ResultController::class, 'index'])->name('result.index');
        // Route::get('predict', [ResultController::class, 'predict'])->name('result.predict');
    });

    // // Tambahkan rute baru di sini
    // Route::get('/predict', [PredictionController::class, 'predict'])->name('predict');
});
