<?php

namespace App\Http\Controllers\Moeda;

use App\Models\Moeda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MoedaController extends Controller
{
    public function index()
    {
        if(!empty($_GET['name'])){
            $moedas = Moeda::where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
        }else{
            $moedas = Moeda::paginate(10);
        }
        return view('moeda.index', compact('moedas'));
    }

    public function store(Request $request)
    {
        Moeda::create($request->all());

        return redirect()->route('moeda')->with('success', 'Moeda salva com sucesso"');
    }

    public function edit($id)
    {
        $moeda = Moeda::find($id);

        return view('moeda.edit', compact('moeda'));
    }

    public function update(Request $request, $id)
    {
        Moeda::find($id)->update($request->all());

        return redirect()->route('moeda')->with('success', 'Moeda atualizado com sucesso"');
    }

    public function destroy($id)
    {
        Moeda::find($id)->delete();

        return redirect()->route('moeda')->with('success', 'Moeda apagado com sucesso"');
    }
}
