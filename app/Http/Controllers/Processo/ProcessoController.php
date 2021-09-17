<?php

namespace App\Http\Controllers\Processo;

use App\Models\User;
use App\Models\Asset;
use App\Models\Citrus;
use App\Models\Modelo;
use App\Models\Calendario;
use App\Models\Insolvente;
use App\Models\Depertamento;
use App\Models\ModeloCategoria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    public function liberarProcesso($id, $metodo)
    {
        switch ($metodo) {
            case 'liberar':
                $citius = Citrus::find($id)->update(['status' => 2]);
                $citius = Citrus::find($id);
                return redirect()->route('processo.liberado')->with('success', 'Processo Nº '.$citius->processo.' Liberado com successo!');
            break;
            case 'liberar-abrir':
                $citius = Citrus::find($id)->update(['status' => 2]);
                return redirect()->route('processo.abrir', $id);
            break;
        }
    }

    public function index()
    {
        # code...
    }

    public function processoVer($id)
    {
        # code...
    }

    public function liberado()
    {
        $dados = new Citrus;
        if(!empty($_GET['data_inicial']) && !empty($_GET['data_final'])){
            $dados = $dados->whereDate('created_at', '>=', date('Y-m-d', strtotime(str_replace('/','-', $_GET['data_inicial']))));
            $dados = $dados->whereDate('created_at', '<=', date('Y-m-d', strtotime(str_replace('/','-', $_GET['data_final']))));
        }else{
            $dados = $dados->whereDate('created_at', '>=', date('Y-m-d'));
            $dados = $dados->whereDate('created_at', '<=', date('Y-m-d'));
        }
        if(!empty($_GET['tribunal'])) $dados = $dados->where('tribunal', 'like', '%'.$_GET['tribunal'].'%');
        if(!empty($_GET['ato'])) $dados = $dados->where('ato', 'like', '%'.$_GET['ato'].'%');
        if(!empty($_GET['referencia'])) $dados = $dados->where('referencia', 'like', '%'.$_GET['referencia'].'%');
        $dados = $dados->where('status', 2)->orderBy('created_at', 'desc')->paginate(15);

        $leiloes = Calendario::with('consultor', 'assets')->get();
        $departamentos = Depertamento::all();
        $users = User::all();
        $assets = Asset::all();
        $categorias = ModeloCategoria::all();
        $modelos = Modelo::with('categoria')->get();
        return view('citrus.citrus', compact('dados', 'users', 'assets', 'leiloes', 'categorias', 'modelos', 'departamentos'));
    }

    public function liberadoVer($id)
    {
        $citius = Citrus::find($id);
        $leiloes = Calendario::with('consultor', 'assets')->get();
        $processo = Citrus::find($id);
        $departamentos = Depertamento::all();
        $users = User::all();
        $assets = Asset::all();
        $categorias = ModeloCategoria::all();
        $insolente = Insolvente::where('nif', $processo->nif_adm)->with('responsavel')->first();
        $modelos = Modelo::with('categoria')->get();
        return view('citrus.ver', compact('citius', 'users', 'assets', 'leiloes', 'categorias', 'modelos', 'departamentos','insolente'));
    }
}
