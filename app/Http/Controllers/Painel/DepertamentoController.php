<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Depertamento;
use Illuminate\Http\Request;

class DepertamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty($_GET['name'])){
            $departamentos = Depertamento::where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
        }else{
            $departamentos = Depertamento::paginate(10);
        }
        return view('departamentos.main', compact('departamentos'));
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


        $save = Depertamento::create($request->all());

        return redirect()->back()->with('success', 'Departamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Depertamento::find($id);
        return view('departamentos.edit', compact('departamento'));
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
        $departamento = Depertamento::find($id);
        $departamento->name = $request->name;
        $departamento->color = $request->color;
        $departamento->save();
        return redirect()->route('painel.departamento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Depertamento::find($id);
        $departamento->delete();
        return redirect()->route('painel.departamento');
    }
}
