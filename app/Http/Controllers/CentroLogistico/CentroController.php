<?php

namespace App\Http\Controllers\CentroLogistico;

use App\Models\User;
use App\Models\Centro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CentroController extends Controller
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
                    $centros = Centro::with('responsavel')->where('name', 'like', '%'.$_GET['name'].'%')->paginate(15);
                break;
                case 'responsavel':
                    $centros = Centro::with('responsavel')->whereHas('responsavel', function ($query){
                        $query->where('name', 'like', '%'.$_GET['name'].'%');
                    })->paginate(10);
                break;
            }
        }else{
            $centros = Centro::with('responsavel')->paginate(15);
        }
        $users = User::all();
        return view('centro.index', compact('users', 'centros'));
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
        $save = Centro::create($request->all());
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
