<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarefaModel extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'modelo',
        'description',
        'departamento_id',
        'user_id',
        'inicio',
        'fim',
        'numero_processo',
        'ai',
        'cep',
        'morada',
        'porta',
        'regiao',
        'distrito',
        'conselho',
        'freguesia',
        'path',
        'compartilhar',
        'status',
        'evento',
        'start_time',
        'start_task',
        'tempo',
    ];

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function alocados()
    {
        return $this->belongsToMany(User::class, Alocado::class, 'tarefa_id', 'user_id');
    }

    public function departamento()
    {
        return $this->belongsTo(Depertamento::class, 'departamento_id');
    }

    public function anexos()
    {
        return $this->hasMany(Anexo::class, 'tarefa_id');
    }
}
