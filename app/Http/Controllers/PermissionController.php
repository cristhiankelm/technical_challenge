<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Criando um usuário e dando permissão de admin
        $user = \App\Models\User::factory()->create();
        auth()->login($user);
        $user->assignPermission('admin');
        
        Gate::authorize('admin');
        
        return 'Você é um admin';
    }
}
