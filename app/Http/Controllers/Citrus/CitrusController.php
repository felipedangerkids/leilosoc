<?php

namespace App\Http\Controllers\Citrus;

use App\Models\User;
use App\Models\Asset;
use App\Models\Citrus;
use App\Models\Calendario;
use Illuminate\Http\Request;
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
        $users = User::all();
        $assets = Asset::all();
        return view('citrus.citrus', compact('dados', 'processo', 'users', 'assets', 'leiloes'));
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
        return view('citrus.ver', compact('citius'));
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
