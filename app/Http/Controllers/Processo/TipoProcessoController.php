<?php

namespace App\Http\Controllers\Processo;

use App\Models\TipoProcesso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoProcessoController extends Controller
{
    public function index()
    {
        if(!empty($_GET['name'])){
            $tiposProcessos = TipoProcesso::where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
        }else{
            $tiposProcessos = TipoProcesso::paginate(10);
        }
        return view('processos.indexTipoProcesso', compact('tiposProcessos'));
    }

    public function store(Request $request)
    {
        TipoProcesso::create($request->all());

        return redirect()->route('tipo_processo')->with('success', 'Tipo de Processo salvo com sucesso"');
    }

    public function edit($id)
    {
        $tipoProcesso = TipoProcesso::find($id);

        return view('processos.editTipoProcesso', compact('tipoProcesso'));
    }

    public function update(Request $request, $id)
    {
        TipoProcesso::find($id)->update($request->all());

        return redirect()->route('tipo_processo')->with('success', 'Tipo de Processo atualizado com sucesso"');
    }

    public function destroy($id)
    {
        TipoProcesso::find($id)->delete();

        return redirect()->route('tipo_processo')->with('success', 'Tipo de Processo apagado com sucesso"');
    }
}
