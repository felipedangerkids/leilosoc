<?php

namespace App\Http\Controllers\Citrus;

use App\Models\User;
use App\Models\Asset;
use App\Models\Citrus;
use App\Models\Modelo;
use App\Models\Calendario;
use App\Models\Insolvente;
use App\Models\Depertamento;
use Illuminate\Http\Request;
use App\Models\ModeloCategoria;
use App\Http\Controllers\Controller;

class CitrusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $dados = Citrus::paginate(15);
        $leiloes = Calendario::with('consultor', 'assets')->get();
        $processo = Citrus::find($id);
        $departamentos = Depertamento::all();
        $users = User::all();
        $assets = Asset::all();
        $categorias = ModeloCategoria::all();
        $modelos = Modelo::with('categoria')->get();
        return view('citrus.citrus', compact('dados', 'processo', 'users', 'assets', 'leiloes', 'categorias', 'modelos', 'departamentos'));
    }

    // Recebdo dados via posto do node citius scraping
    public function scraping()
    {
        // Essa função serve para arrumar o array vindo do posto
        function arrumaArray($array){
            $novoArray = [];
            foreach($array as $arr1){
                $arrayDado = [];
                foreach($arr1 as $arr2){
                    foreach($arr2 as $arrKey => $arrValue){
                        if($arrKey == 'insolventes'){
                            $tempDValue = [];
                            $tempCont = 0;
                            $tempLCont = 0;
                            $tempKName = '';
                            foreach($arrValue as $arr3){
                                foreach($arr3 as $arr3Key => $arr3Value){
                                    if($arr3Key !== $tempKName){
                                        $tempLCont++;
                                        $tempKName = $arr3Key;
                                        $tempDValue[$tempCont][preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($arr3Key)))] = $arr3Value;
                                        if($tempLCont == 2){
                                            $tempLCont = 0;
                                            $tempCont++;
                                        }
                                    }else{
                                        $tempCont++;
                                        $tempDValue[$tempCont][preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($arr3Key)))] = $arr3Value;
                                    }
                                }
                            }
                            $arrayDado[preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($arrKey)))] = $tempDValue;
                        }else{
                            $arrayDado[preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($arrKey)))] = $arrValue;
                        }
                    }
                }
                $novoArray[] = $arrayDado;
            }

            return $novoArray;
        }

        $dados =  file_get_contents('php://input');

        // Para gravar log se necessario
        $data_hora = date('Y-m-d H:i:s');
        $quebra = chr(13).chr(10);
        $fp = fopen("./log.log", "a");
        $escreve = fwrite($fp, '['.$data_hora.']-------->>>>>>');
        $escreve = fwrite($fp, json_encode(arrumaArray(json_decode($dados))).$quebra);
        fclose($fp);

        $dados = arrumaArray(json_decode($dados));

        foreach($dados as $data){
            $citius['tribunal']         = $data['tribunal'];
            $citius['ato']              = $data['ato'];
            $citius['referencia']       = $data['referencia'];
            $citius['processo']         = explode(',', $data['processo'])[0];
            $citius['especie']          = $data['especie'];
            $citius['data']             = $data['data'];
            $citius['data_propositura'] = $data['data_da_propositura_da_acao'];
            $citius['document']         = $data['document_ins'];

            $contInsol = 0;
            $contInsolAdm = 0;
            $contInsolCredor = 0;
            foreach($data['insolventes'] as $insolventes){
                $arr = array_keys($insolventes);

                if($arr[0] == 'insolvente'){
                    if($contInsol == 0){
                        $citius['insolvente']       = $insolventes['insolvente'] ?? '';
                        $citius['nif']              = $insolventes['nif_nipc'] ?? '';
                    }
                    $contInsol++;
                }
                if($arr[0] == 'administrador_insolvencia'){
                    if($contInsolAdm == 0){
                        $citius['adm_insolvencia']      = $insolventes['administrador_insolvencia'] ?? '';
                        $citius['nif_adm']              = $insolventes['nif_nipc'] ?? '';
                    }
                    $contInsolAdm++;
                }
                if($arr[0] == 'credor'){
                    if($contInsolCredor == 0){
                        $citius['credor']       = $insolventes['credor'] ?? '';
                        $citius['nif_credor']   = $insolventes['nif_nipc'] ?? '';
                    }
                    $contInsolCredor++;
                }
            }

            $verifCitius = Citrus::where('processo', $citius['processo'])->get();
            if($verifCitius->count() == 0){
                Citrus::create($citius);
            }
        }

        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citrus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = Citrus::create($request->all());

        return redirect()->route('citrus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dado = Citrus::find($id);
        $dado->delete();
        return redirect()->back();
    }
}
