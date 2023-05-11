<?php

namespace App\Http\Controllers;

use App\Models\TitreAnnonce;
use Illuminate\Http\Request;

class TitreAnnonceController extends Controller
{
    //
    public function index()
    {
       $titres = TitreAnnonce::all();

        return view('titreAnnonce', compact('titres')) ;
    }
}
