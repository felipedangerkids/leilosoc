<?php

namespace App\Http\Controllers\Asset;

use App\Models\Asset;
use App\Models\Citrus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if(!empty($_GET['name'])){
            switch($_GET['coluna']){
                case 'numero':
                    $assets = Asset::where('numero', 'like', '%'.$_GET['name'].'%')->orderBy('created_at', 'desc')->paginate(10);
                break;
                case 'km_inicio':
                    $assets = Asset::where('kmini', 'like', '%'.$_GET['name'].'%')->orderBy('created_at', 'desc')->paginate(10);
                break;
                case 'km_inicio_data':
                    $data = date('Y-m-d', strtotime(str_replace('/','-',$_GET['name'])));
                    $assets = Asset::whereDate('created_at', '=', $data)->orderBy('created_at', 'desc')->paginate(10);
                break;
                break;
                case 'km_fim':
                    $assets = Asset::where('kmfim', 'like', '%'.$_GET['name'].'%')->orderBy('created_at', 'desc')->paginate(10);
                break;
                case 'km_fim_data':
                    $data = date('Y-m-d', strtotime(str_replace('/','-',$_GET['name'])));
                    $assets = Asset::whereDate('updated_at', '=', $data)->orderBy('created_at', 'desc')->paginate(10);
                break;
            }
        }else{
            $assets = Asset::orderBy('created_at', 'desc')->paginate(10);
        }
        $processo = Citrus::find($id);

        return view('asset.index', compact('processo', 'assets'));
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
        $save = Asset::create($request->all());

        return redirect()->route('assets')->with('success', 'Criado com sucesso!');
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
    public function update(Request $request)
    {
        $id = $request->idasset;
        $asset = Asset::find($id);
        $asset->kmfim = $request->kmfim;
        $asset->save();
        return redirect()->back()->with('success', 'Pronto');
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
