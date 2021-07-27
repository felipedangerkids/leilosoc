<?php

namespace App\Http\Controllers\Tarefas;

use App\Models\User;
use App\Models\Citrus;
use App\Models\Modelo;
use App\Models\Insolvente;
use App\Models\TarefaModel;
use App\Models\Depertamento;
use Illuminate\Http\Request;
use App\Models\ModeloCategoria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $processo = Citrus::find($id);
        $tarefas = TarefaModel::orderBy('created_at', 'desc')->get();
        $departamentos = Depertamento::all();
        $users = User::all();
        $insolente = Insolvente::where('nif', $processo->nif)->with('responsavel')->first();
        $categorias = ModeloCategoria::all();
        $modelos = Modelo::with('categoria')->get();
        return view('tarefas.create.index', compact('departamentos', 'users', 'tarefas', 'categorias', 'modelos', 'processo', 'insolente'));
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


    public function calendar()
    {
        $dados = TarefaModel::all();
        return view('tarefas.fullcalendar', compact('dados'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('path')){
            $image = $request->file('path');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/files/');

            $image->move($destinationPath, $name);

            $save = TarefaModel::create([
                'name' => $request->name,
                'modelo' => $request->modelo,
                'description' => $request->description,
                'departamento_id' => 1,
                'user_id' => 1,
                'inicio' => date('Y-m-d', strtotime(str_replace('/','-',$request->inicio))),
                'fim' => date('Y-m-d', strtotime(str_replace('/','-',$request->fim))),
                'cep' => $request->cep,
                'morada'=> $request->morada,
                'porta' => $request->porta,
                'regiao' => $request->regiao,
                'distrito' => $request->distrito,
                'conselho' => $request->conselho,
                'freguesia' => $request->freguesia,
                'path'=> $name,
                'compartilhar' => $request->compartilhar,
            ]);

        }



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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function cep(Request $request)
    {

        $valor = $request->search;
        $cep = str_replace('-', '', $valor);

        $url = Http::get('https://api.duminio.com/ptcp/ptapi60ec808f3e8951.33243239/'.$cep);

        return $url->collect();
    }
}
