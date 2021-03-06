<?php

namespace App\Http\Controllers\Tarefas;

use App\Models\User;
use App\Models\Anexo;
use App\Models\Agente;
use App\Models\Citrus;
use App\Models\Modelo;
use App\Models\Alocado;
use App\Models\Comentario;
use App\Models\Insolvente;
use App\Models\TarefaModel;
use App\Models\TarefasCompartilhada;
use App\Models\Depertamento;
use Illuminate\Http\Request;
use App\Models\ModeloCategoria;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use ZipArchive;

use App\Mail\TarefaCompartilhada;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty($_GET['name'])){
            switch($_GET['coluna']){
                case 'numero_tarefa':
                    $tarefas = TarefaModel::with('alocados', 'anexos')->where('numero_processo', 'like', '%'.$_GET['name'].'%')->paginate(10);
                break;
                case 'data':
                    $data = date('Y-m-d', strtotime(str_replace('/','-',$_GET['name'])));
                    $tarefas = TarefaModel::with('alocados', 'anexos')->where('fim', $data)->paginate(10);
                break;
                case 'modelo':
                    $tarefas = TarefaModel::with('alocados', 'anexos')->where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
                break;
            }
        }else{
            $tarefas = TarefaModel::with(['alocados', 'anexos'])->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('tarefas.create.index', compact('tarefas'));
    }

    public function tarefaDetalhe($id)
    {
        $users = User::all();
        $tarefa = TarefaModel::with(['alocados', 'anexos', 'departamento'])->find($id);
        $comentarios = Comentario::with('user')->where('tarefa_id', $id)->get();
        return view('tarefas.main', compact('tarefa', 'comentarios', 'users'));
    }

    public function alocadosAtualizar(Request $request)
    {
        $alocados = Alocado::where('tarefa_id', $request->tarefa_id)->get();
        $alocadosExistentes = [];
        foreach($alocados as $alocado){
            // Verifica????o para apagar
            if(!in_array($alocado->user_id, $request->alocados)){
                Alocado::where('tarefa_id', $request->tarefa_id)->where('user_id', $alocado->user_id)->delete();
            }else{
                $alocadosExistentes[] = $alocado->user_id;
            }
        }

        foreach($request->alocados as $novoAlocado){
            if(!in_array($novoAlocado, $alocadosExistentes)){
                Alocado::create([
                    'tarefa_id' => $request->tarefa_id,
                    'user_id' => $novoAlocado
                ]);
            }
        }
        return response()->json();
    }

    public function minhaTarefa()
    {
        if(!empty($_GET['name'])){
            switch($_GET['coluna']){
                case 'numero_tarefa':
                    $tarefas = TarefaModel::with('alocados', 'anexos')->where('numero_processo', 'like', '%'.$_GET['name'].'%')->paginate(10);
                break;
                case 'data':
                    $data = date('Y-m-d', strtotime(str_replace('/','-',$_GET['name'])));
                    $tarefas = TarefaModel::with('alocados', 'anexos')->where('fim', $data)->paginate(10);
                break;
                case 'modelo':
                    $tarefas = TarefaModel::with('alocados', 'anexos')->where('name', 'like', '%'.$_GET['name'].'%')->paginate(10);
                break;
            }
        }else{
            $tarefas = TarefaModel::with(['alocados', 'anexos'])->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('tarefas.create.minhaTarefa', compact('tarefas'));
    }

    public function criarTarefa($id = null)
    {
        $citius = null;
        $insolvente = null;
        $user = null;
        if ($id) {
            $citius = Citrus::find($id);
            $insolvente = Insolvente::where('nif', $citius->nif_adm)->first();
            $user = User::with('departamento')->find($insolvente->user_id);
        }
        $users = User::all();
        $departamentos = Depertamento::all();
        $insolventes = Insolvente::all();
        $modelos = Modelo::all();

        return view('tarefas.create.criarTarefa', compact('users', 'modelos', 'departamentos', 'insolventes', 'insolvente', 'user', 'citius'));
    }

    public function anexos(Request $request)
    {
        $upload = $request->file->store('public/tarefa_images');
        $path_file = explode('/', $upload);
        if ($request->tarefa_id) {
            Anexo::create([
                'tarefa_id' => $request->tarefa_id,
                'anexo_nome' => $path_file[1] . '/' . $path_file[2]
            ]);
        }
        return response()->json($path_file[1] . '/' . $path_file[2]);
    }
    public function anexosRemove(Request $request)
    {
        Storage::delete('public/' . $request->fileList);
        if ($request->tarefa_id) {
            Anexo::where('tarefa_id', $request->tarefa_id)->where('anexo_nome', $request->fileList)->delete();
        }
        return response()->json();
    }

    public function anexosTarefaRemove($id)
    {
        $anexo = Anexo::find($id);
        Storage::delete('public/' . $anexo->anexo_nome);
        $anexo->delete();
        return response()->json();
    }

    public function anexoBaixar($tarefa_id)
    {
        $anexos = Anexo::where('tarefa_id', $tarefa_id)->get();

        // Criar instancia de ZipArchive
        $zip = new ZipArchive;
        $zipPath = 'anexos.zip'; // path do zip

        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            foreach ($anexos as $anexo) {
                // adicionar arquivo ao zip
                $zip->addFile('storage/' . $anexo->anexo_nome, basename(explode('/', $anexo->anexo_nome)[1]));
            }
            // concluir a operacao
            $zip->close();
        }

        if (file_exists($zipPath)) {
            // For??amos o donwload do arquivo.
            header('Content-Type: application/zip');
            header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
            header('Content-Disposition: attachment; filename="' . $zipPath . '"');
            readfile($zipPath);
            //removemos o arquivo zip ap??s download
            unlink($zipPath);
        }

        return true;
    }

    public function calendar()
    {
        $tarefas = TarefaModel::all();
        return view('tarefas.calendario.index', compact('tarefas'));
    }

    public function store(Request $request)
    {
        $dates = explode('-', $request->start_end_date);
        $start_date = date('Y-m-d', strtotime(str_replace('/', '-', trim($dates[0]))));
        $final_date = date('Y-m-d', strtotime(str_replace('/', '-', trim($dates[1]))));

        $modelo = Modelo::find($request->modelo);

        $save = TarefaModel::create([
            'name' => $modelo->name,
            'modelo' => $request->modelo,
            'description' => $request->description,
            'departamento_id' => $request->departamento,
            'user_id' => auth()->user()->id,
            'inicio' => $start_date,
            'fim' => $final_date,
            'numero_processo' => $request->numero_processo,
            'ai' => $request->ai,
        ]);

        foreach ($request->alocados as $alocado) {
            Alocado::create([
                'tarefa_id' => $save->id,
                'user_id' => $alocado
            ]);
        }

        if($request->anexos){
            foreach ($request->anexos as $anexo) {
                Anexo::create([
                    'tarefa_id' => $save->id,
                    'anexo_nome' => $anexo
                ]);
            }
        }

        return redirect()->back()->with('success', 'Tarefa criado com sucesso!');
    }

    public function timer(Request $request)
    {
        $dateTime = date('Y-m-d H:i:s');
        $tarefa = TarefaModel::find($request->tarefa_id);
        $tarefa_play['evento'] = $request->evento;
        if ($tarefa->start_task == null) $tarefa_play['start_task'] = $dateTime;
        $tarefa_play['start_time'] = $dateTime;
        $tarefa_play['tempo'] = date('H:i:s', strtotime($request->timer));

        $tarefa->update($tarefa_play);
        return response()->json($request->all());
    }

    public function cep(Request $request)
    {
        $valor = $request->search;
        $cep = str_replace('-', '', $valor);

        $url = Http::get('https://api.duminio.com/ptcp/ptapi60ec808f3e8951.33243239/'.$cep);
        $dadosFirst = str_replace('<i>Desconhecido</i>', '"false"', $url->body());
        $dadosFirst = str_replace(' ,', '"false",', $dadosFirst);
        $dadosFirst = json_decode($dadosFirst);

        if($dadosFirst){
            if($dadosFirst->Latitude !== 'false' && $dadosFirst->Longitude !== 'false'){
                return response()->json($dadosFirst);
            }
        }

        $url = Http::get('https://maps.google.com/maps/api/geocode/json?address='.$request->search.'&sensor=false&key=AIzaSyCcTnukB7zVZVr3T-Pk6-Lptswge0BDOXg');
        $dados = json_decode($url->collect());

        $dados = [
            'CodigoPostal' => $dados->results[0]->address_components[0]->long_name,
            'Morada' => $dadosFirst->Morada,
            'Localidade' => $dados->results[0]->address_components[1]->long_name,
            'Freguesia' => $dadosFirst->Freguesia,
            'Concelho' => $dadosFirst->Concelho,
            'Distrito' => $dados->results[0]->address_components[2]->long_name,
            'Latitude' => $dados->results[0]->geometry->location->lat,
            'Longitude' => $dados->results[0]->geometry->location->lng,
        ];

        return response()->json($dados);
    }

    public function destroy($id)
    {

        $tarefa = TarefaModel::with(['alocados', 'anexos', 'departamento'])->find($id);

        $tarefa->delete();
        return redirect()->back();
    }

    public function compartilharTarefa(Request $request)
    {
        $tarefas = TarefasCompartilhada::where('tarefa_id', $request->tarefa_id)->where('tarefa_email', $request->tarefa_email)->get();

        if($tarefas->count() == 0){
            $link_tarefa = asset('/tarefa-compartilhada/'.bin2hex(base64_encode($request->tarefa_id.','.$request->tarefa_email)));

            $tarefa_compartilhada['tarefa_id']      = $request->tarefa_id;
            $tarefa_compartilhada['tarefa_email']   = $request->tarefa_email;
            $tarefa_compartilhada['tarefa_texto']   = ($request->tarefa_text ?? '.');
            $tarefa_compartilhada['tarefa_link']    = $link_tarefa;

            TarefasCompartilhada::create($tarefa_compartilhada);

            Mail::to($request->tarefa_email)->send(new TarefaCompartilhada(($request->tarefa_text ?? ''), $link_tarefa));
        }

        return response()->json();
    }

    public function tarefaCompartilhada($id)
    {
        $hash = hex2bin($id);
        $hash = base64_decode($hash);
        $hash = explode(',', $hash);
        $id = $hash[0];
        $email = $hash[1];

        $tarefa_compartilhada = TarefasCompartilhada::where('tarefa_id', $id)->where('tarefa_email', $email)->first();

        if($tarefa_compartilhada){

            $users = User::all();
            $tarefa = TarefaModel::with(['alocados', 'anexos', 'departamento'])->find($id);
            $comentarios = Comentario::with('user')->where('tarefa_id', $id)->get();
            return view('tarefas.compartilhada.main', compact('tarefa', 'comentarios', 'users'));
        }
    }
}
