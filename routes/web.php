<?php

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
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas de la lógica

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
});
