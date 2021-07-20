<?php

use App\Http\Controllers\Citrus\CitrusController;
use App\Http\Controllers\Painel\ColaboradorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Painel\DepertamentoController;
use App\Http\Controllers\painel\TarefaController;
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

    Route::get('painel/departamentos', [DepertamentoController::class, 'index'])->name('painel.departamento');
    Route::get('painel/departamentos/edit/{id}', [DepertamentoController::class, 'edit'])->name('painel.departamento.edit');
    Route::post('painel/departamentos/update/{id}', [DepertamentoController::class, 'update'])->name('painel.departamento.update');
    Route::post('painel/departamentos/store', [DepertamentoController::class, 'store'])->name('painel.departamento.store');
    Route::any('painel/departamentos/delete/{id}', [DepertamentoController::class, 'destroy'])->name('painel.departamento.delete');

    Route::get('citrus', [CitrusController::class, 'index'])->name('citrus');
    Route::get('citrus/create', [CitrusController::class, 'create'])->name('citrus.create');
    Route::get('citrus/show/{id}', [CitrusController::class, 'show'])->name('citrus.show');
    Route::post('citrus/store', [CitrusController::class, 'store'])->name('citrus.store');
    Route::any('citrus/delete/{id}', [CitrusController::class, 'destroy'])->name('citrus.delete');

    Route::get('painel/tarefas', [TarefaController::class, 'index'])->name('painel.tarefa');
    Route::post('painel/tarefas', [TarefaController::class, 'store'])->name('painel.tarefa.store');
    Route::get('painel/tarefas/edit/{id}', [TarefaController::class, 'edit'])->name('painel.tarefa.edit');
    Route::post('painel/tarefas/update/{id}', [TarefaController::class, 'update'])->name('painel.tarefa.update');
    Route::any('painel/tarefa/delete/{id}', [TarefaController::class, 'destroy'])->name('painel.tarefa.delete');
    Route::get('users/{id}', function ($id) {

    });
});



