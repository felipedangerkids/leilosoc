<?php

namespace App\Http\Controllers\Calendario;

use App\Models\User;
use App\Models\Asset;
use App\Models\Citrus;
use App\Models\Calendario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $leiloes = Calendario::all();
        $processo = Citrus::find($id);
        $users = User::all();
        $assets = Asset::all();
        return view('calendario.index', compact('processo', 'users', 'assets', 'leiloes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = Calendario::all();
        return view('calendario.calendario', compact('dados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $save = Calendario::create([
            'tipo' => $request->tipo,
            'inicio' => date('Y-m-d', strtotime(str_replace('/','-',$request->inicio))),
            'fim' => date('Y-m-d', strtotime(str_replace('/','-',$request->fim))),
            'processo' => $request->processo,
            'descricao' => $request->processo,
            'consultora' => $request->consultora,
            'asset' => $request->asset,
            'visitas' => $request->visitas,
            'entrada' => date('Y-m-d', strtotime(str_replace('/','-',$request->entrada))),
            'vender' => $request->vender,
            'reducao'=> $request->reducao,
            'estado' => $request->estado,
            'comunicacoes' => $request->comunicacoes,
            'pro_online' => $request->pro_online,
            'cat_online' => $request->cat_online,
            'obs' => $request->obs,
            'data_com'=> date('Y-m-d', strtotime(str_replace('/','-',$request->data_com))),
            'data_pro' => date('Y-m-d', strtotime(str_replace('/','-',$request->data_pro))),
            'data_cat' => date('Y-m-d', strtotime(str_replace('/','-',$request->data_cat))),

        ]);
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
}
