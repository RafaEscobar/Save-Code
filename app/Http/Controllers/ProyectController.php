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
        $filter = new ProyectFilter();
        $proyects = Proyect::where($filter->buildQuery($request))->when(isset($request->withCodes), function($query){
            return $query->with('codes');
        });
        return new ProyectCollection($proyects->paginate(10)->appends($request->query()));
    }
}