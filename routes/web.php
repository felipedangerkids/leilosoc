<?php

use App\Http\Controllers\Painel\ColaboradorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Painel\DepertamentoController;
use App\Http\Controllers\Teste\TesteController;
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

Route::get('teste', [TesteController::class, 'index']);

Route::get('/entrar', function () {
    return view('entrar.main');
})->name('entrar');
Route::post('/login/post', [LoginController::class, 'login'])->name('login.store');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('painel/users', [UserController::class, 'index'])->name('painel.users');
    Route::get('painel/users/edit/{id}', [UserController::class, 'edit'])->name('painel.users.edit');
    Route::post('painel/users/update/{id}', [UserController::class, 'update'])->name('painel.users.update');
    Route::any('painel/users/delete/{id}', [UserController::class, 'destroy'])->name('painel.users.delete');
    Route::post('painel/users/store', [UserController::class, 'store'])->name('painel.users.store');

<<<<<<< Updated upstream
    Route::get('painel/departamentos', [DepertamentoController::class, 'index'])->name('painel.departamento');
    Route::get('painel/departamentos/edit/{id}', [DepertamentoController::class, 'edit'])->name('painel.departamento.edit');
    Route::post('painel/departamentos/update/{id}', [DepertamentoController::class, 'update'])->name('painel.departamento.update');
    Route::post('painel/departamentos/store', [DepertamentoController::class, 'store'])->name('painel.departamento.store');
    Route::any('painel/departamentos/delete/{id}', [DepertamentoController::class, 'destroy'])->name('painel.departamento.delete');

});
=======
Route::get('painel/departamentos', [DepertamentoController::class, 'index'])->name('painel.departamento');
Route::post('painel/departamentos/store', [DepertamentoController::class, 'store'])->name('painel.departamento.store');



>>>>>>> Stashed changes
