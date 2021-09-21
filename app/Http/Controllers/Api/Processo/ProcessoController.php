<?php

namespace App\Http\Controllers\Api\Processo;

use App\Models\Processo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    public function processos()
    {
        $processos = Processo::with('adm_insolvencia', 'citius', 'tipo_processo', 'comarca', 'tribunal', 'consultor', 'asset', 'moeda', 'pais')->get();
        return response()->json($processos);
    }

    public function processo($id)
    {
        $processo = Processo::find($id)->with('adm_insolvencia', 'citius', 'tipo_processo', 'comarca', 'tribunal', 'consultor', 'asset', 'moeda', 'pais');
        return response()->json($processo);
    }
}
