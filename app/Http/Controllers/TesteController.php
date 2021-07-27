<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;
use App\Models\ModeloCategoria;

class TesteController extends Controller
{

    public function test()
    {
        $get = Modelo::with('categoria')->get();
        dd($get);
    }
}
