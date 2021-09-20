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
use App\Models\Processo;
use App\Models\TipoProcesso;
use App\Models\Comarca;
use App\Models\Tribunal;
use App\Models\Moeda;
use App\Models\Pais;

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
        $processos = new Processo;
        if(!empty($_GET['data_entrada_inicial']) && !empty($_GET['data_entrada_final'])){
            $processos = $processos->whereDate('data_entrada', '>=', conDate($_GET['data_entrada_inicial'], 'YMD'));
            $processos = $processos->whereDate('data_entrada', '<=', conDate($_GET['data_entrada_final'], 'YMD'));
        }
        if(!empty($_GET['numero_processo'])) $processos = $processos->where('numero_processo', 'like', '%'.$_GET['numero_processo'].'%');
        if(!empty($_GET['referencia'])) $processos = $processos->where('referencia', 'like', '%'.$_GET['referencia'].'%');
        if(!empty($_GET['titular_processo'])) $processos = $processos->where('titular_processo', 'like', '%'.$_GET['titular_processo'].'%');
        if(!empty($_GET['adm_insolvencia'])) {
            $processos = $processos->with('adm_insolvencia')->whereHas('adm_insolvencia', function($query){
                $query->where('name', 'like', '%'.$_GET['adm_insolvencia'].'%');
            });
        }else{
            $processos = $processos->with('adm_insolvencia');
        }
        $processos = $processos->with('citius', 'tipo_processo', 'comarca', 'tribunal', 'consultor', 'asset', 'moeda', 'pais')->orderBy('created_at', 'desc')->paginate(15);

        return view('processos.indexProcesso', compact('processos'));
    }

    public function editProcesso($id)
    {
        $processo = Processo::with('citius', 'tipo_processo', 'comarca', 'tribunal', 'consultor', 'asset', 'adm_insolvencia', 'moeda', 'pais')->find($id);
        $tiposProcessos = TipoProcesso::all();
        $comarcas = Comarca::all();
        $tribunais = Tribunal::all();
        $consultores = User::with('departamento')->whereHas('departamento', function ($query){
            $query->where('name', 'like', '%consultor%');
        })->get();
        $assets = User::with('departamento')->whereHas('departamento', function ($query){
            $query->where('name', 'like', '%asset%');
        })->get();
        $insolventes = Insolvente::all();
        $moedas = Moeda::all();
        $paises = Pais::all();

        return view('processos.editProcesso', compact('processo', 'tiposProcessos', 'comarcas', 'tribunais', 'consultores', 'assets', 'insolventes', 'moedas', 'paises'));
    }

    public function updateProcesso(Request $request)
    {
        $processo['citius_id']          = $request->citius_id;
        $processo['numero_processo']    = $request->numero_processo;
        $processo['referencia']         = $request->referencia;
        $processo['tipo_processo_id']   = $request->tipo_processo;
        $processo['data_entrada']       = conDate($request->data_entrada, 'YMD');
        $processo['data_auto_penhora']  = conDate($request->data_auto_penhora, 'YMD');
        $processo['comarca_id']         = $request->comarca;
        $processo['tribunal_id']        = $request->tribunal;
        $processo['consultor_id']       = $request->consultor;
        $processo['asset_id']           = $request->asset;
        $processo['titular_processo']   = $request->titular_processo;
        $processo['entidade']           = $request->entidade;
        $processo['adm_insolvencia_id'] = $request->adm_insolvencia;
        $processo['moeda_id']           = $request->moeda;
        $processo['pais_id']            = $request->pais;
        $processo['status']             = 1;

        $processo = Processo::find($request->processo_id)->update($processo);

        return redirect()->route('processo')->with('success', 'Processo Atualziado com sucesso!');
    }

    public function destroyProcesso($id)
    {
        Processo::find($id)->delete();

        return redirect()->route('processo')->with('success', 'Processo Apagado com sucesso!');
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

    public function abrirProcesso($id)
    {
        $citius = Citrus::find($id);
        $tiposProcessos = TipoProcesso::all();
        $comarcas = Comarca::all();
        $tribunais = Tribunal::all();
        $consultores = User::with('departamento')->whereHas('departamento', function ($query){
            $query->where('name', 'like', '%consultor%');
        })->get();
        $assets = User::with('departamento')->whereHas('departamento', function ($query){
            $query->where('name', 'like', '%asset%');
        })->get();
        $insolventes = Insolvente::all();
        $moedas = Moeda::all();
        $paises = Pais::all();

        return view('processos.abrirProcesso', compact('citius', 'tiposProcessos', 'comarcas', 'tribunais', 'consultores', 'assets', 'insolventes', 'moedas', 'paises'));
    }

    public function salvarProcesso(Request $request)
    {
        $processo['citius_id']          = $request->citius_id;
        $processo['numero_processo']    = $request->numero_processo;
        $processo['referencia']         = $request->referencia;
        $processo['tipo_processo_id']   = $request->tipo_processo;
        $processo['data_entrada']       = conDate($request->data_entrada, 'YMD');
        $processo['data_auto_penhora']  = conDate($request->data_auto_penhora, 'YMD');
        $processo['comarca_id']         = $request->comarca;
        $processo['tribunal_id']        = $request->tribunal;
        $processo['consultor_id']       = $request->consultor;
        $processo['asset_id']           = $request->asset;
        $processo['titular_processo']   = $request->titular_processo;
        $processo['entidade']           = $request->entidade;
        $processo['adm_insolvencia_id'] = $request->adm_insolvencia;
        $processo['moeda_id']           = $request->moeda;
        $processo['pais_id']            = $request->pais;
        $processo['status']             = 1;

        $processo = Processo::create($processo);

        return redirect()->route('processo')->with('success', 'Processo Aberto com sucesso!');
    }
}
