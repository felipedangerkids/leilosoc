<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insolvente extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'nif',
        'preferencial',
        'telemovel',
        'user_id',
        'email',
        'codigo_postal',
        'morada',
        'regiao',
        'porta',
        'distrito',
        'conselho',
        'freguesia',
        'latitude',
        'longitude',
    ];

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
