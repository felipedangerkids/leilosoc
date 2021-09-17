<?php

namespace App\Http\Controllers\Tribunal;

use App\Models\Tribunal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TribunalController extends Controller
{
    public function index()
    {
        if(!empty($_GET['name'])){
            $tribunais = Tribunal::where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
        }else{
            $tribunais = Tribunal::paginate(10);
        }
        return view('tribunal.index', compact('tribunais'));
    }

    public function store(Request $request)
    {
        Tribunal::create($request->all());

        return redirect()->route('tribunal')->with('success', 'Tribunal salvo com sucesso"');
    }

    public function edit($id)
    {
        $tribunal = Tribunal::find($id);

        return view('tribunal.edit', compact('tribunal'));
    }

    public function update(Request $request, $id)
    {
        Tribunal::find($id)->update($request->all());

        return redirect()->route('tribunal')->with('success', 'Tribunal atualizado com sucesso"');
    }

    public function destroy($id)
    {
        Tribunal::find($id)->delete();

        return redirect()->route('tribunal')->with('success', 'Tribunal apagado com sucesso"');
    }
}
