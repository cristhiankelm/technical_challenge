<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
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
    Route::middleware(['can:admin'])
        ->controller(IncomeController::class)
        ->name('income.')
        ->group(function () {
            Route::get('/ingresos/datatable', 'datatable')->name('datatable');
            Route::get('/ingresos', 'index')->name('index');
            Route::get('/ingresos/create', 'create')->name('create');
            Route::post('/ingresos/store', 'store')->name('store');
            Route::get('/ingresos/edit/{income}', 'edit')->name('edit');
            Route::put('/ingresos/update/{income}', 'update')->name('update');
            Route::delete('/ingresos/delete/{income}', 'destroy')->name('destroy');
        });
    
    // Egresos monetátios
    Route::middleware(['can:admin'])
        ->controller(ExpenseController::class)
        ->name('expense.')
        ->group(function () {
            Route::get('/egresos/datatable', 'datatable')->name('datatable');
            Route::get('/egresos', 'index')->name('index');
            Route::get('/egresos/create', 'create')->name('create');
            Route::post('/egresos/store', 'store')->name('store');
            Route::get('/egresos/edit/{expense}', 'edit')->name('edit');
            Route::put('/egresos/update/{expense}', 'update')->name('update');
            Route::delete('/egresos/delete/{expense}', 'destroy')->name('destroy');
        });

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});
