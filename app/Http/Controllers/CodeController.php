<?php

namespace App\Http\Controllers;

use App\Http\Filters\CodesFilter;
use App\Http\Resources\Collections\CodeCollection;
use App\Models\Code;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function index(Request $request)
    {
        $filter = new CodesFilter();
        $codes = Code::where($filter->buildQuery($request));
        return new CodeCollection($codes->paginate(10)->appends($request->query()));
    }
}
