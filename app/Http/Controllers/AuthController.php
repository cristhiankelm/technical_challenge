<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Muestra la vista de registro de usuario.
     */
    public function register()
    {
        return view('auth/register');
    }
    
    /**
     * Valida y guarda un nuevo usuario en la base de datos. Redirige a la página de inicio de sesión tras el registro exitoso.
     */
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'phone_number' => 'required|numeric',
            'address' => 'required'
        ])->validate();

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ]);

        return redirect()->route('login');
    }
    
    /**
     * Muestra la vista de inicio de sesión.
     */
    public function login()
    {
        return view('auth/login');
    }
    
    /**
     * Valida las credenciales de inicio de sesión y autentica al usuario. Redirige al panel de control tras un inicio de sesión exitoso.
     */
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
    
    /**
     * Cierra la sesión del usuario y redirige a la página de inicio.
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
    
    /**
     * Muestra la vista del perfil de usuario.
     */
    public function profile()
    {
        return view('auth/profile');
    }
}
