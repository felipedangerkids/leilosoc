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
        'telemovel',
        'user_id',
    ];

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
