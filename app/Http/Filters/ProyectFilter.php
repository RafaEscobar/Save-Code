<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;
use App\Http\Filters\Filter;

class ProyectFilter extends Filter {
    protected $acceptedParams = [
        'name' => ['li'],
        'user_id' => ['eq']
    ];
}