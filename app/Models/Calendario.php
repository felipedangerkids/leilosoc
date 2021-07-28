<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'inicio',
        'fim',
        'processo',
        'descricao',
        'consultora',
        'asset',
        'vender',
        'entrada',
        'visitas',
        'reducao',
        'estado',
        'comunicacoes',
        'pro_online',
        'cat_online',
        'obs',
        'data_com',
        'data_pro',
        'data_cat',
    ];

    public function consultor()
    {
        return $this->belongsTo(User::class, 'consultora');
    }
}
