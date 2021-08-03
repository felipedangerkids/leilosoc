<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'categoria_id',
        'status',
    ];

    public function categoria()
    {
        return $this->belongsTo(ModeloCategoria::class, 'categoria_id');
    }

    public function departamento()
    {
        return $this->belongsTo(Depertamento::class, 'categoria_id');
    }
}
