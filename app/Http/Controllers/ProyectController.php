<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProyectFilter;
use App\Http\Resources\Collections\ProyectCollection;
use App\Models\Proyect;
use Illuminate\Http\Request;

class ProyectController extends Controller
{
    public function index(Request $request)
    {
        dd($request->query());
        $filter = new ProyectFilter();
        $proyects = Proyect::with('codes')->where($filter->buildQuery($request))->get();
        return new ProyectCollection($proyects);
    }
}