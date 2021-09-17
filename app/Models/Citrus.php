<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citrus extends Model
{
    use HasFactory;
    protected $fillable = [
        'tribunal',
        'ato',
        'referencia',
        'processo',
        'especie',
        'data',
        'data_propositura',
        'insolvente',
        'nif',
        'adm_insolvencia',
        'nif_adm',
        'credor',
        'nif_credor',
        'document',
        'status'
    ];
}

