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
    ];

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
