<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    protected $fillable = [
        'citius_id',
        'numero_processo',
        'referencia',
        'tipo_processo_id',
        'data_entrada',
        'data_auto_penhora',
        'comarca_id',
        'tribunal_id',
        'consultor_id',
        'asset_id',
        'titular_processo',
        'entidade',
        'adm_insolvencia_id',
        'moeda_id',
        'pais_id',
        'status',
    ];

    public function citius()
    {
        return $this->belongsTo(Citrus::class, 'citius_id');
    }
    public function tipo_processo()
    {
        return $this->belongsTo(TipoProcesso::class, 'tipo_processo_id');
    }
    public function comarca()
    {
        return $this->belongsTo(Comarca::class, 'comarca_id');
    }
    public function tribunal()
    {
        return $this->belongsTo(Tribunal::class, 'tribunal_id');
    }
    public function consultor()
    {
        return $this->belongsTo(User::class, 'consultor_id');
    }
    public function asset()
    {
        return $this->belongsTo(User::class, 'asset_id');
    }
    public function adm_insolvencia()
    {
        return $this->belongsTo(Insolvente::class, 'adm_insolvencia_id');
    }
    public function moeda()
    {
        return $this->belongsTo(Moeda::class, 'moeda_id');
    }
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id');
    }
}
