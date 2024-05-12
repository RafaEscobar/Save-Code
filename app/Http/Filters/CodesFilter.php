<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;
use App\Http\Filters\Filter;

class CodesFilter extends Filter {
    protected $acceptedParams = [
        'is_favorite' => ['eq'],
        'language' => ['eq', 'li'],
        'proyect_id' => ['eq']
    ];
}