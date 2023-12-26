<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\StatementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
 * Регистрация, вход в ЛК, восстановление пароля
 */
Route::group([
    'as' => 'auth.', // имя маршрута, например auth.index
    'prefix' => 'auth', // префикс маршрута, например auth/index
], function () {
    // форма регистрации
    Route::get('register', [RegisterController::class, 'register'])
        ->name('register');
    // создание пользователя
    Route::post('register', [RegisterController::class, 'create'])
        ->name('create');
    // форма входа
    Route::get('login', [LoginController::class, 'login'])
        ->name('login');
    // аутентификация
    Route::post('login', [LoginController::class, 'authenticate'])
        ->name('auth');
    // выход
    Route::get('logout', [LoginController::class, 'logout'])
        ->name('logout');
});

/*
 * Личный кабинет пользователя
 */
Route::group([
    'as' => 'user.', // имя маршрута, например user.index
    'prefix' => 'user', // префикс маршрута, например user/index
    'middleware' => ['auth'] // один или несколько посредников
], function () {
    // главная страница
    Route::get('index', [StatementController::class, 'index'])
        ->name('index');

    Route::get('/statement/create', function () {
        return view('user.create-blank');
    })->middleware(['auth', 'verified'])->name('create');
    
    Route::post('/statment/send', [StatementController::class, 'send'])
        ->name('send');
    
    Route::delete('/statment/{id}', [StatementController::class, 'destroy'])
        ->name('statment.destroy');
    
});

/**
 * Админ
 */
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin-panel', [StatementController::class, 'admin'])
        ->name('admin-panel');
    Route::post('/admin-panel/accept/{id}', [StatementController::class, 'accept'])
        ->name('admin-panel.accept');
    Route::post('/admin-panel/deny/{id}', [StatementController::class, 'deny'])
        ->name('admin-panel.deny');
    Route::post('/admin-panel/cancel/{id}', [StatementController::class, 'cancel'])
        ->name('admin-panel.cancel');
    Route::delete('/admin-panel/{id}', [StatementController::class, 'destroy'])
        ->name('admin-panel.destroy');
});