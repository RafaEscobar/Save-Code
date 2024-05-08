<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\ProyectCollection;
use App\Models\Proyect;
use Illuminate\Http\Request;

class ProyectController extends Controller
{
    public function index()
    {
        $proyects = Proyect::all();
        return new ProyectCollection($proyects);
    }
}
