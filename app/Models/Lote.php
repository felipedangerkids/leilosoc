<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $fillable = [
        'processo_id',
        'numero',
        'referencia',
        'valor_abertura',
        'valor_minimo',
        'valor_base',
        'valor_venda',
        'estimativa_minima',
        'estimativa_maxima',
        'iva',
        'moeda',
        'estado_licitacao',
        'data_fim',
        'data_fim_efetiva',
        'publicar',
        'vendido',
        'venda_anulada',
        'destaque',
        'bolsa_imoveis',
        'faturado',
        'pago',
        'venda_realizada',
        'titulo',
        'descricao',
        'subtitulo',
        'breve_descricao',
        'autor',
        'curador',
        'especialista',
        'vendedor',
    ];
}
