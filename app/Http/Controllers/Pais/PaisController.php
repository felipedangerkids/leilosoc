<?php

namespace App\Http\Controllers\Pais;

use App\Models\Pais;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index()
    {
        if(!empty($_GET['name'])){
            $paises = Pais::where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
        }else{
            $paises = Pais::paginate(10);
        }
        return view('pais.index', compact('paises'));
    }

    public function store(Request $request)
    {
        Pais::create($request->all());

        return redirect()->route('pais')->with('success', 'Pais salvo com sucesso"');
    }

    public function edit($id)
    {
        $pais = Pais::find($id);

        return view('pais.edit', compact('pais'));
    }

    public function update(Request $request, $id)
    {
        Pais::find($id)->update($request->all());

        return redirect()->route('pais')->with('success', 'Pais atualizado com sucesso"');
    }

    public function destroy($id)
    {
        Pais::find($id)->delete();

        return redirect()->route('pais')->with('success', 'Pais apagado com sucesso"');
    }
}
