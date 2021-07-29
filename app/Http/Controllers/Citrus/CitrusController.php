<?php

namespace App\Http\Controllers\Citrus;

use App\Models\User;
use App\Models\Asset;
use App\Models\Citrus;
use App\Models\Modelo;
use App\Models\Calendario;
use App\Models\Insolvente;
use App\Models\Depertamento;
use Illuminate\Http\Request;
use App\Models\ModeloCategoria;
use App\Http\Controllers\Controller;

class CitrusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $dados = Citrus::paginate(15);
        $leiloes = Calendario::with('consultor', 'assets')->get();
        $processo = Citrus::find($id);
        $departamentos = Depertamento::all();
        $users = User::all();
        $assets = Asset::all();
        $categorias = ModeloCategoria::all();
        $modelos = Modelo::with('categoria')->get();
        return view('citrus.citrus', compact('dados', 'processo', 'users', 'assets', 'leiloes', 'categorias', 'modelos', 'departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citrus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = Citrus::create($request->all());

        return redirect()->route('citrus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citius = Citrus::find($id);
        $leiloes = Calendario::with('consultor', 'assets')->get();
        $processo = Citrus::find($id);
        $departamentos = Depertamento::all();
        $users = User::all();
        $assets = Asset::all();
        $categorias = ModeloCategoria::all();
        $insolente = Insolvente::where('nif', $processo->nif_adm)->with('responsavel')->first();
        $modelos = Modelo::with('categoria')->get();
        return view('citrus.ver', compact('citius', 'users', 'assets', 'leiloes', 'categorias', 'modelos', 'departamentos','insolente'));
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
        $dado = Citrus::find($id);
        $dado->delete();
        return redirect()->back();
    }
}
