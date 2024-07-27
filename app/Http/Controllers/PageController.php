<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function discover()
    {
        return view('info.discover'); // Assurez-vous que ce fichier Blade existe dans le répertoire des vues
    }
}
