<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tarefa_id',
        'coment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
