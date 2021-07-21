<?php

namespace App\Http\Controllers\painel;

use App\Models\User;
use App\Models\TarefaModel;
use App\Models\Depertamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Depertamento::all();
        $tarefas = TarefaModel::all();
        $users = User::with('departamento')->get();
        return view('tarefas.main', compact('tarefas', 'departamentos', 'users'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = TarefaModel::create($request->all());
        return redirect()->back()->with('success', 'Tarefa criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefas = TarefaModel::find($id);
        return view('tarefas.edit', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarefas = TarefaModel::find($id);
        $tarefas->name = $request->name;
        $tarefas->save();
        return redirect()->route('painel.tarefas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefas = TarefaModel::find($id);
        $tarefas->delete();
        return redirect()->route('painel.tarefas');
    }
}
