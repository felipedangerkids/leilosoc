<?php

namespace App\Http\Controllers\Insolventes;

use App\Models\User;
use App\Models\Insolvente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InsolventeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $insolventes = Insolvente::with('responsavel')->paginate(15);
        return view('insolventes.index', compact('users', 'insolventes'));
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
        // dd($request->all());
        $save = Insolvente::create($request->all());
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
        $users = User::all();
        $insolventes = Insolvente::with('responsavel')->find($id);
        return view('insolventes.edit', compact('users', 'insolventes'));
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
        $save = Insolvente::find($id)->update($request->all());
        return redirect()->route('insolventes')->with('success', 'Ataulizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Insolvente = Insolvente::find($id);
        $Insolvente->delete();
        return redirect()->route('insolventes')->with('success', 'Dados apagados com sucesso!');
    }
}
