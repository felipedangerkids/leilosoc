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
use App\Models\Depertamento;
use Illuminate\Http\Request;
use App\Models\ModeloCategoria;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use ZipArchive;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefas = TarefaModel::with(['alocados', 'anexos'])->orderBy('created_at', 'desc')->get();
        return view('tarefas.create.index', compact('tarefas'));
    }

    public function tarefaDetalhe($id)
    {

        $tarefa = TarefaModel::with(['alocados', 'anexos', 'departamento'])->find($id);
        $comentarios = Comentario::with('user')->where('tarefa_id', $id)->get();
        return view('tarefas.main', compact('tarefa', 'comentarios'));
    }

    public function minhaTarefa()
    {
        $tarefas = TarefaModel::with(['alocados', 'anexos'])->orderBy('created_at', 'desc')->get();

        return view('tarefas.create.minhaTarefa', compact('tarefas'));
    }

    public function criarTarefa($id = null)
    {
        $citius = null;
        if($id){
            $citius = Citrus::find($id);
        }
        $users = User::all();
        $departamentos = Depertamento::all();
        $insolventes = Insolvente::all();

        return view('tarefas.create.criarTarefa', compact('users', 'departamentos', 'insolventes', 'citius'));
    }

    public function anexos(Request $request)
    {
        $upload = $request->file->store('public/tarefa_images');
        $path_file = explode('/', $upload);
        if($request->tarefa_id){
            Anexo::create([
                'tarefa_id' => $request->tarefa_id,
                'anexo_nome' => $path_file[1].'/'.$path_file[2]
            ]);
        }
        return response()->json($path_file[1].'/'.$path_file[2]);
    }
    public function anexosRemove(Request $request)
    {
        Storage::delete('public/'.$request->fileList);
        if($request->tarefa_id){
            Anexo::where('tarefa_id', $request->tarefa_id)->where('anexo_nome', $request->fileList)->delete();
        }
        return response()->json();
    }

    public function anexosTarefaRemove($id)
    {
        $anexo = Anexo::find($id);
        Storage::delete('public/'.$anexo->anexo_nome);
        $anexo->delete();
        return response()->json();
    }

    public function anexoBaixar($tarefa_id)
    {
        $anexos = Anexo::where('tarefa_id',$tarefa_id)->get();

        // Criar instancia de ZipArchive
        $zip = new ZipArchive;
        $zipPath = 'anexos.zip'; // path do zip

        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE){
            foreach($anexos as $anexo){
                // adicionar arquivo ao zip
                $zip->addFile('storage/'.$anexo->anexo_nome, basename(explode('/', $anexo->anexo_nome)[1]));
            }
            // concluir a operacao
            $zip->close();
        }

        if(file_exists($zipPath)){
            // Forçamos o donwload do arquivo.
            header('Content-Type: application/zip');
            header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
            header('Content-Disposition: attachment; filename="'.$zipPath.'"');
            readfile($zipPath);
            //removemos o arquivo zip após download
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
        $start_date = date('Y-m-d', strtotime(str_replace('/','-',trim($dates[0]))));
        $final_date = date('Y-m-d', strtotime(str_replace('/','-',trim($dates[1]))));

        $save = TarefaModel::create([
            'name' => $request->modelo,
            'modelo' => $request->modelo,
            'description' => $request->description,
            'departamento_id' => $request->departamento,
            'user_id' => auth()->user()->id,
            'inicio' => $start_date,
            'fim' => $final_date,
            'numero_processo' => $request->numero_processo,
            'ai' => $request->ai,
        ]);

        foreach($request->alocados as $alocado){
            Alocado::create([
                'tarefa_id' => $save->id,
                'user_id' => $alocado
            ]);
        }

        foreach($request->anexos as $anexo){
            Anexo::create([
                'tarefa_id' => $save->id,
                'anexo_nome' => $anexo
            ]);
        }

        return redirect()->back()->with('success', 'Tarefa criado com sucesso!');
    }

    public function cep(Request $request)
    {
        $valor = $request->search;
        $cep = str_replace('-', '', $valor);

        $url = Http::get('https://api.duminio.com/ptcp/ptapi60ec808f3e8951.33243239/' . $cep);

        return $url->collect();
    }
}
