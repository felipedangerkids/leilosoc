<?php

namespace App\Http\Controllers\Agente;

use App\Models\User;
use App\Models\Agente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentesController extends Controller
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
                    $Agentes = Agente::with('responsavel')->where('name', 'like', '%'.$_GET['name'].'%')->paginate(15);
                break;
                case 'responsavel':
                    $Agentes = Agente::with('responsavel')->whereHas('responsavel', function ($query){
                        $query->where('name', 'like', '%'.$_GET['name'].'%');
                    })->paginate(10);
                break;
            }
        }else{
            $Agentes = Agente::with('responsavel')->paginate(15);
        }
        $users = User::all();
        return view('agentes.index', compact('users', 'Agentes'));
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
        $save = Agente::create($request->all());
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
