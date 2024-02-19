<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitioController extends Controller
{
    public function info($tipo = null)
    {
        $otra = 'algo';
        
        return view('informacion', compact('tipo', 'otra'));
        // return view('informacion', ['tipo' -> $tipo, 'otra' ->])
        // return view
    }
}
