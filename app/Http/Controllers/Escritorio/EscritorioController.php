<?php

namespace App\Http\Controllers\Escritorio;

use App\Models\Escritorio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EscritorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escritorios = Escritorio::all();
        return view('escritorio.index', compact('escritorios'));
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
        $save = Escritorio::create($request->all());

        return redirect()->back()->with('success', 'Criado com sucesso!');
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
        $escritorio = Escritorio::find($id);
        return view('escritorio.edit', compact('escritorio'));
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
        $save = Escritorio::find($id)->update($request->all());
        return redirect()->route('escritorio')->with('success', 'Ataulizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Escritorio = Escritorio::find($id);
        $Escritorio->delete();
        return redirect()->route('escritorio')->with('success', 'Dados apagados com sucesso!');
    }
}
