<?php

use App\Http\Controllers\AssignPermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Vamos logar com o usuário de id 1 e dar permissão de admin
auth()->loginUsingId(1);
$user = \App\Models\User::find(1)->assignPermission('admin');

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Ingresos monetátios
    Route::controller(IncomeController::class)
        ->name('incomes.')
        ->group(function () {
            Route::get('/ingresos/datatable', 'datatable')->name('datatable');
            Route::get('/ingresos', 'index')->name('index');
            Route::get('/ingreso/create', 'create')->name('create');
            Route::post('/ingreso/store', 'store')->name('store');
            Route::get('/ingreso/edit/{income}', 'edit')->name('edit');
            Route::put('/ingreso/update/{income}', 'update')->name('update');
            Route::delete('/ingreso/delete/{income}', 'destroy')->name('destroy');
        });
    
    // Egresos monetátios
    Route::controller(ExpenseController::class)
        ->name('expenses.')
        ->group(function () {
            Route::get('/egresos/datatable', 'datatable')->name('datatable');
            Route::get('/egresos', 'index')->name('index');
            Route::get('/egreso/create', 'create')->name('create');
            Route::post('/egreso/store', 'store')->name('store');
            Route::get('/egreso/edit/{expense}', 'edit')->name('edit');
            Route::put('/egreso/update/{expense}', 'update')->name('update');
            Route::delete('/egreso/delete/{expense}', 'destroy')->name('destroy');
        });
    
    // Rutas atribuidas a usuarios con nivel de permision Administrador
    Route::middleware('can:admin')->group(function () {
        // Usuários
        Route::controller(UserController::class)
            ->name('users.')
            ->group(function () {
                Route::get('/usuarios/datatable', 'datatable')->name('datatable');
                Route::get('/usuarios', 'index')->name('index');
            });
        
        // Permisos
        Route::controller(PermissionController::class)
            ->name('permissions.')
            ->group(function () {
                Route::get('/permisos/datatable', 'datatable')->name('datatable');
                Route::get('/permisos', 'index')->name('index');
                Route::get('/permiso/create', 'create')->name('create');
                Route::post('/permiso/store', 'store')->name('store');
                Route::get('/permiso/edit/{permission}', 'edit')->name('edit');
                Route::put('/permiso/update/{permission}', 'update')->name('update');
                Route::delete('/permiso/delete/{permission}', 'destroy')->name('destroy');
            });
        
        // Usuários
        Route::controller(AssignPermissionController::class)
            ->name('assign-permissions.')
            ->group(function () {
                Route::get('/user/{user}/permissions', 'index')->name('index');
                Route::get('/asignar-permisos', 'create')->name('create');
                Route::put('/asignar-permisos/{user}', 'update')->name('update');
            });
        
    });
    
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});
