<?php

namespace App\Http\Controllers\Tarefas;

use App\Models\Modelo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ModeloCategoria;
use App\Models\Depertamento;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty($_GET['name'])){
            switch($_GET['coluna']){
                case 'name':
                    $modelos = Modelo::with('departamento')->where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
                break;
                case 'departamento':
                    $modelos = Modelo::with('departamento')->whereHas('departamento', function ($query){
                        $query->where('name', 'like', '%'.$_GET['name'].'%');
                    })->paginate(10);
                break;
            }
        }else{
            $modelos = Modelo::with('departamento')->paginate(10);
        }
        // $categorias = ModeloCategoria::all();
        $departamentos = Depertamento::all();
        return view('tarefas.modelo.index', compact('modelos', 'departamentos'));
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
        $save = Modelo::create($request->all());
        return redirect()->back()->with('success', 'Modelo criado com sucesso!');
    }

    public function catStore(Request $request)
    {
        $save = ModeloCategoria::create($request->all());
        return redirect()->back()->with('success', 'Categoria criado com sucesso!');
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
        $modelo = Modelo::with('departamento')->find($id);
        $departamentos = Depertamento::all();
        return view('tarefas.modelo.edit', compact('modelo', 'departamentos'));
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
        $save = Modelo::find($id)->update($request->all());
        return redirect()->route('modelos')->with('success', 'Ataulizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Modelo = Modelo::find($id);
        $Modelo->delete();
        return redirect()->route('modelos')->with('success', 'Dados apagados com sucesso!');
    }
}
