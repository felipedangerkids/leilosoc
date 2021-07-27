<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Citrus\CitrusController;
use App\Http\Controllers\Insolventes\InsolventeController;
use App\Http\Controllers\Tarefas\ModeloController;
use App\Http\Controllers\Tarefas\TarefaController;
use App\Http\Controllers\Painel\ColaboradorController;
use App\Http\Controllers\Painel\DepertamentoController;
use App\Http\Controllers\Painel\FullcalendarController;

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

    Route::get('painel/modelos', [ModeloController::class, 'index'])->name('modelos');
    Route::post('painel/modelos/post', [ModeloController::class, 'store'])->name('modelos.post');
    Route::post('painel/modelos/cat/post', [ModeloController::class, 'catStore'])->name('modelos.cat.post');


    Route::get('painel/tarefas/{id?}', [TarefaController::class, 'index'])->name('painel.tarefas');
    Route::post('painel/tarefas/post', [TarefaController::class, 'store'])->name('painel.tarefas.store');
    Route::get('cep', [TarefaController::class, 'cep'])->name('painel.cep');

    Route::get('teste', [TesteController::class, 'test']);


    Route::get('insolventes', [InsolventeController::class, 'index'])->name('insolventes');
    Route::post('insolventes/post', [InsolventeController::class, 'store'])->name('insolventes.post');

    Route::get('users/{id}', function ($id) {

    });
});



Route::get('taferas/calendario', [TarefaController::class, 'calendar'])->name('calendario');
