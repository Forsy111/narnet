<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Форма регистрации
     */
    public function register() {
        return view('auth.register');
    }

    /**
     * Добавление пользователя
     */
    public function create(Request $request) {
        $request->validate([
            'login' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'tel' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'login' => $request->login,
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('auth.login')
            ->with('success', 'Вы успешно зарегистрировались');
    }
}
