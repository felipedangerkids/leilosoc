<?php

namespace App\Http\Controllers\Processo;

use App\Models\Lote;
use App\Models\Imposto;
use App\Models\Moeda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LotesController extends Controller
{
    public function index($id)
    {
        $processo_id = $id;
        $lotes = Lote::where('processo_id', $processo_id);
        if(!empty($_GET['data_fim_inicial']) && !empty($_GET['data_fim_final'])){
            $lotes = $lotes->whereDate('data_fim', '>=', conDate($_GET['data_fim_inicial'], 'YMD'));
            $lotes = $lotes->whereDate('data_fim', '<=', conDate($_GET['data_fim_final'], 'YMD'));
        }
        if(!empty($_GET['numero'])) $lotes = $lotes->where('numero', 'like', '%'.$_GET['numero'].'%');
        if(!empty($_GET['referencia'])) $lotes = $lotes->where('referencia', 'like', '%'.$_GET['referencia'].'%');
        if(!empty($_GET['titulo'])) $lotes = $lotes->where('titulo', 'like', '%'.$_GET['titulo'].'%');
        $lotes = $lotes->paginate(10);
        return view('processos.lotes.index', compact('processo_id', 'lotes'));
    }

    public function create($id)
    {
        $processo_id = $id;
        $impostos = Imposto::all();
        $moedas = Moeda::all();
        return view('processos.lotes.create', compact('processo_id', 'impostos', 'moedas'));
    }

    public function store(Request $request, $id)
    {
        $lote['processo_id']        = $id;
        $lote['numero']             = $request->numero;
        $lote['referencia']         = $request->referencia;
        $lote['valor_abertura']     = $request->valor_abertura ? str_replace(['.',','],['','.'], $request->valor_abertura) : null;
        $lote['valor_minimo']       = $request->valor_minimo ? str_replace(['.',','],['','.'], $request->valor_minimo) : null;
        $lote['valor_base']         = $request->valor_base ? str_replace(['.',','],['','.'], $request->valor_base) : null;
        $lote['valor_venda']        = $request->valor_venda ? str_replace(['.',','],['','.'], $request->valor_venda) : null;
        $lote['estimativa_minima']  = $request->estimativa_minima;
        $lote['estimativa_maxima']  = $request->estimativa_maxima;
        $lote['iva']                = $request->iva;
        $lote['moeda']              = $request->moeda;
        $lote['estado_licitacao']   = $request->estado_licitacao;
        $lote['data_fim']           = conDate($request->data_fim, 'YMDHIS');
        $lote['data_fim_efetiva']   = conDate($request->data_fim_efetiva, 'YMDHIS');
        $lote['publicar']           = $request->publicar ?? 'false';
        $lote['vendido']            = $request->vendido ?? 'false';
        $lote['venda_anulada']      = $request->venda_anulada ?? 'false';
        $lote['destaque']           = $request->destaque ?? 'false';
        $lote['bolsa_imoveis']      = $request->bolsa_imoveis ?? 'false';
        $lote['faturado']           = $request->faturado ?? 'false';
        $lote['pago']               = $request->pago ?? 'false';
        $lote['venda_realizada']    = $request->venda_realizada ?? 'false';
        $lote['titulo']             = $request->titulo;
        $lote['descricao']          = $request->descricao;
        $lote['subtitulo']          = $request->subtitulo;
        $lote['breve_descricao']    = $request->breve_descricao;
        $lote['autor']              = $request->autor;
        $lote['curador']            = $request->curador;
        $lote['especialista']       = $request->especialista;
        $lote['vendedor']           = $request->vendedor;

        Lote::create($lote);

        return redirect()->route('lotes', $id)->with('success', 'Lote cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $lote = Lote::find($id);
        $impostos = Imposto::all();
        $moedas = Moeda::all();
        return view('processos.lotes.edit', compact('lote', 'impostos', 'moedas'));
    }

    public function update(Request $request, $id)
    {
        $lote['numero']             = $request->numero;
        $lote['referencia']         = $request->referencia;
        $lote['valor_abertura']     = $request->valor_abertura ? str_replace(['.',','],['','.'], $request->valor_abertura) : null;
        $lote['valor_minimo']       = $request->valor_minimo ? str_replace(['.',','],['','.'], $request->valor_minimo) : null;
        $lote['valor_base']         = $request->valor_base ? str_replace(['.',','],['','.'], $request->valor_base) : null;
        $lote['valor_venda']        = $request->valor_venda ? str_replace(['.',','],['','.'], $request->valor_venda) : null;
        $lote['estimativa_minima']  = $request->estimativa_minima;
        $lote['estimativa_maxima']  = $request->estimativa_maxima;
        $lote['iva']                = $request->iva;
        $lote['moeda']              = $request->moeda;
        $lote['estado_licitacao']   = $request->estado_licitacao;
        $lote['data_fim']           = conDate($request->data_fim, 'YMDHIS');
        $lote['data_fim_efetiva']   = conDate($request->data_fim_efetiva, 'YMDHIS');
        $lote['publicar']           = $request->publicar ?? 'false';
        $lote['vendido']            = $request->vendido ?? 'false';
        $lote['venda_anulada']      = $request->venda_anulada ?? 'false';
        $lote['destaque']           = $request->destaque ?? 'false';
        $lote['bolsa_imoveis']      = $request->bolsa_imoveis ?? 'false';
        $lote['faturado']           = $request->faturado ?? 'false';
        $lote['pago']               = $request->pago ?? 'false';
        $lote['venda_realizada']    = $request->venda_realizada ?? 'false';
        $lote['titulo']             = $request->titulo;
        $lote['descricao']          = $request->descricao;
        $lote['subtitulo']          = $request->subtitulo;
        $lote['breve_descricao']    = $request->breve_descricao;
        $lote['autor']              = $request->autor;
        $lote['curador']            = $request->curador;
        $lote['especialista']       = $request->especialista;
        $lote['vendedor']           = $request->vendedor;

        Lote::find($id)->update($lote);
        $lote = Lote::find($id);;

        return redirect()->route('lotes', $lote->processo_id)->with('success', 'Lote atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $lote_id = Lote::find($id);
        $lote = Lote::find($id)->delete();

        return redirect()->route('lotes', $lote_id->processo_id)->with('success', 'Lote apagado com sucesso!');
    }
}
