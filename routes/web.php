<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
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
            Route::get('/ingresos/create', 'create')->name('create');
            Route::post('/ingresos/store', 'store')->name('store');
            Route::get('/ingresos/edit/{incomes}', 'edit')->name('edit');
            Route::put('/ingresos/update/{incomes}', 'update')->name('update');
            Route::delete('/ingresos/delete/{incomes}', 'destroy')->name('destroy');
        });
    
    // Egresos monetátios
    Route::controller(ExpenseController::class)
        ->name('expenses.')
        ->group(function () {
            Route::get('/egresos/datatable', 'datatable')->name('datatable');
            Route::get('/egresos', 'index')->name('index');
            Route::get('/egresos/create', 'create')->name('create');
            Route::post('/egresos/store', 'store')->name('store');
            Route::get('/egresos/edit/{expenses}', 'edit')->name('edit');
            Route::put('/egresos/update/{expenses}', 'update')->name('update');
            Route::delete('/egresos/delete/{expenses}', 'destroy')->name('destroy');
        });
    
    Route::middleware('can:admin')->group(function () {
        // Egresos monetátios
        Route::controller(UserController::class)
            ->name('users.')
            ->group(function () {
                Route::get('/usuarios/datatable', 'datatable')->name('datatable');
                Route::get('/usuarios', 'index')->name('index');
            });
    });
    
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});
