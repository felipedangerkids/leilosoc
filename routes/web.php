<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Asset\AssetController;
use App\Http\Controllers\Citrus\CitrusController;
use App\Http\Controllers\Agente\AgentesController;
use App\Http\Controllers\Depesas\DepesaController;
use App\Http\Controllers\Tarefas\ModeloController;
use App\Http\Controllers\Tarefas\TarefaController;
use App\Http\Controllers\Painel\ColaboradorController;
use App\Http\Controllers\Painel\DepertamentoController;
use App\Http\Controllers\Painel\FullcalendarController;
use App\Http\Controllers\Calendario\CalendarioController;
use App\Http\Controllers\Escritorio\EscritorioController;
use App\Http\Controllers\CentroLogistico\CentroController;
use App\Http\Controllers\Insolventes\InsolventeController;
use App\Http\Controllers\Desinvestimento\DesinvestimentosController;

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


Route::post('/citius/scraping', [CitrusController::class, 'scraping']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('cadastro/')->group(function () {
        // Usuarios
        Route::get('users', [UserController::class, 'index'])->name('painel.users');
        Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('painel.users.edit');
        Route::post('users/update/{id}', [UserController::class, 'update'])->name('painel.users.update');
        Route::any('users/delete/{id}', [UserController::class, 'destroy'])->name('painel.users.delete');
        Route::post('users/store', [UserController::class, 'store'])->name('painel.users.store');

        // Departamentos
        Route::get('departamentos', [DepertamentoController::class, 'index'])->name('painel.departamento');
        Route::get('departamentos/edit/{id}', [DepertamentoController::class, 'edit'])->name('painel.departamento.edit');
        Route::post('departamentos/update/{id}', [DepertamentoController::class, 'update'])->name('painel.departamento.update');
        Route::post('departamentos/store', [DepertamentoController::class, 'store'])->name('painel.departamento.store');
        Route::any('departamentos/delete/{id}', [DepertamentoController::class, 'destroy'])->name('painel.departamento.delete');

        Route::get('insolventes', [InsolventeController::class, 'index'])->name('insolventes');
        Route::post('insolventes/post', [InsolventeController::class, 'store'])->name('insolventes.post');
        Route::get('insolventes/edit/{id}', [InsolventeController::class, 'edit'])->name('insolventes.edit');
        Route::post('insolventes/update/{id}', [InsolventeController::class, 'update'])->name('insolventes.update');
        Route::any('insolventes/delete/{id}', [InsolventeController::class, 'destroy'])->name('insolventes.delete');

        Route::get('agentes', [AgentesController::class, 'index'])->name('agentes');
        Route::post('agentes/post', [AgentesController::class, 'store'])->name('agentes.post');
        Route::get('agentes/edit/{id}', [AgentesController::class, 'edit'])->name('agentes.edit');
        Route::post('agentes/update/{id}', [AgentesController::class, 'update'])->name('agentes.update');
        Route::any('agentes/delete/{id}', [AgentesController::class, 'destroy'])->name('agentes.delete');

        Route::get('centros', [CentroController::class, 'index'])->name('centros');
        Route::post('centros/post', [CentroController::class, 'store'])->name('centros.post');
        Route::get('centros/edit/{id}', [CentroController::class, 'edit'])->name('centros.edit');
        Route::post('centros/update/{id}', [CentroController::class, 'update'])->name('centros.update');
        Route::any('centros/delete/{id}', [CentroController::class, 'destroy'])->name('centros.delete');

        Route::get('desinvestimentos', [DesinvestimentosController::class, 'index'])->name('desinvestimentos');
        Route::post('desinvestimentos/post', [DesinvestimentosController::class, 'store'])->name('desinvestimentos.post');
        Route::get('desinvestimentos/edit/{id}', [DesinvestimentosController::class, 'edit'])->name('desinvestimentos.edit');
        Route::post('desinvestimentos/update/{id}', [DesinvestimentosController::class, 'update'])->name('desinvestimentos.update');
        Route::any('desinvestimentos/delete/{id}', [DesinvestimentosController::class, 'destroy'])->name('desinvestimentos.delete');

        Route::get('escritorio', [EscritorioController::class, 'index'])->name('escritorio');
        Route::post('escritorio/post', [EscritorioController::class, 'store'])->name('escritorio.post');
        Route::get('escritorio/edit/{id}', [EscritorioController::class, 'edit'])->name('escritorio.edit');
        Route::post('escritorio/update/{id}', [EscritorioController::class, 'update'])->name('escritorio.update');
        Route::any('escritorio/delete/{id}', [EscritorioController::class, 'destroy'])->name('escritorio.delete');

        Route::get('modelos', [ModeloController::class, 'index'])->name('modelos');
        Route::post('modelos/post', [ModeloController::class, 'store'])->name('modelos.post');
        Route::post('modelos/cat/post', [ModeloController::class, 'catStore'])->name('modelos.cat.post');
        Route::get('modelos/edit/{id}', [ModeloController::class, 'edit'])->name('modelos.edit');
        Route::post('modelos/update/{id}', [ModeloController::class, 'update'])->name('modelos.update');
        Route::any('modelos/delete/{id}', [ModeloController::class, 'destroy'])->name('modelos.delete');
    });

    Route::prefix('tarefa/')->group(function () {
        Route::get('tarefas/{id?}', [TarefaController::class, 'index'])->name('painel.tarefas');
        Route::get('minhas/tarefas/{id?}', [TarefaController::class, 'minhaTarefa'])->name('painel.minhas.tarefas');

        Route::get('criar/{id?}', [TarefaController::class, 'criarTarefa'])->name('painel.tarefa.criar');
        Route::post('tarefas/post', [TarefaController::class, 'store'])->name('painel.tarefas.store');

        Route::post('tarefas/anexos', [TarefaController::class, 'anexos'])->name('painel.tarefas.anexos');
        Route::post('tarefas/anexos/remove', [TarefaController::class, 'anexosRemove'])->name('painel.tarefas.anexos.remove');

        Route::get('tarefaDetalhe/{id}', [TarefaController::class, 'tarefaDetalhe'])->name('painel.tarefas.detalhes');
    });

    Route::prefix('citius/')->group(function () {
        Route::get('processos/{id?}', [CitrusController::class, 'index'])->name('citrus');
        Route::get('processos/create', [CitrusController::class, 'create'])->name('citrus.create');
        Route::get('processos/show/{id}', [CitrusController::class, 'show'])->name('citrus.show');
        Route::post('processos/store', [CitrusController::class, 'store'])->name('citrus.store');
        Route::any('processos/delete/{id}', [CitrusController::class, 'destroy'])->name('citrus.delete');
    });

    Route::prefix('calendario/')->group(function () {
        Route::get('leilao/{id?}', [CalendarioController::class, 'index'])->name('leilao');
        Route::post('leilao/post', [CalendarioController::class, 'store'])->name('leilao.post');

        Route::get('leiloes', [CalendarioController::class, 'create'])->name('leiloes');
    });

    Route::prefix('assets/')->group(function () {
        Route::get('assets/{id?}', [AssetController::class, 'index'])->name('assets');
        Route::post('assets/post', [AssetController::class, 'store'])->name('assets.post');
        Route::post('assets/update', [AssetController::class, 'update'])->name('assets.update');
    });

    Route::prefix('depesas/')->group(function () {
    });

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('cep', [TarefaController::class, 'cep'])->name('painel.cep');

    Route::get('teste', [TesteController::class, 'test']);

    Route::post('depesas/post', [DepesaController::class, 'store'])->name('depesa.post');

    Route::get('users/{id}', function ($id) {
    });
});



Route::get('taferas/calendario', [TarefaController::class, 'calendar'])->name('calendario');
