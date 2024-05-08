<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collection\CodeCollection;
use App\Models\Code;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function index()
    {
        $codes = Code::all();
        return new CodeCollection($codes);
    }
}
