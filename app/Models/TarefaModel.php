<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarefaModel extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
        'departamento_id',
        'user_id',
        'inicio',
        'fim',
        'cep',
        'morada',
        'porta',
        'regiao',
        'distrito',
        'conselho',
        'freguesia',
        'path',
        'compartilhar',

    ];
}
