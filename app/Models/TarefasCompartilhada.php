<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarefasCompartilhada extends Model
{
    use HasFactory;

    protected $fillable = [
        'tarefa_id',
        'tarefa_email',
        'tarefa_texto',
        'tarefa_link',
    ];
}
