<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Painel\DepertamentoController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/entrar', function () {
    return view('entrar.main');
})->name('entrar');
Route::post('/login/post', [LoginController::class, 'login'])->name('login.store');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('painel/users', [UserController::class, 'index'])->name('painel.users');
Route::post('painel/users/store', [UserController::class, 'store'])->name('painel.users.store');

Route::get('painel/departamentos', [DepertamentoController::class, 'index'])->name('painel.departamento');
Route::post('painel/departamentos/store', [DepertamentoController::class, 'store'])->name('painel.departamento.store');
