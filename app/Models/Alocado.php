<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alocado extends Model
{
    use HasFactory;

    protected $fillable = [
        'tarefa_id',
        'user_id',
    ];
}
