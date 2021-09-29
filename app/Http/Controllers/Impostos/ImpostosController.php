<?php

namespace App\Http\Controllers\Impostos;

use App\models\Imposto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImpostosController extends Controller
{
    public function index()
    {
        if(!empty($_GET['name'])){
            $impostos = Imposto::where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
        }else{
            $impostos = Imposto::paginate(10);
        }
        return view('impostos.index', compact('impostos'));
    }

    public function store(Request $request)
    {
        Imposto::create($request->all());

        return redirect()->route('imposto')->with('success', 'Imposto salvo com sucesso');
    }

    public function edit($id)
    {
        $imposto = Imposto::find($id);

        return view('impostos.edit', compact('imposto'));
    }

    public function update(Request $request, $id)
    {
        Imposto::find($id)->update($request->all());

        return redirect()->route('imposto')->with('success', 'Imposto atualizado com sucesso');
    }

    public function destroy($id)
    {
        Imposto::find($id)->delete();

        return redirect()->route('imposto')->with('success', 'Imposto apagado com sucesso"');
    }
}
