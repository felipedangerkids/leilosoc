<?php

namespace App\Http\Controllers\Comarca;

use App\Models\Comarca;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComarcaController extends Controller
{
    public function index()
    {
        if(!empty($_GET['name'])){
            $comarcas = Comarca::where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
        }else{
            $comarcas = Comarca::paginate(10);
        }
        return view('comarca.index', compact('comarcas'));
    }

    public function store(Request $request)
    {
        Comarca::create($request->all());

        return redirect()->route('comarca')->with('success', 'Comarca salvo com sucesso"');
    }

    public function edit($id)
    {
        $comarca = Comarca::find($id);

        return view('comarca.edit', compact('comarca'));
    }

    public function update(Request $request, $id)
    {
        Comarca::find($id)->update($request->all());

        return redirect()->route('comarca')->with('success', 'Comarca atualizado com sucesso"');
    }

    public function destroy($id)
    {
        Comarca::find($id)->delete();

        return redirect()->route('comarca')->with('success', 'Comarca apagado com sucesso"');
    }
}
