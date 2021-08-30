<?php

namespace App\Http\Controllers\Calendario;

use App\Models\User;
use App\Models\Citrus;
use App\Models\TarefaModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarioController extends Controller
{
    public function index()
    {
        $tarefas = TarefaModel::all();
        return view('calendario.index', compact('tarefas'));
    }
}
