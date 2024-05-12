<?php

namespace App\Http\Filters;

use Illuminate\Http\Request;

class Filter {
    //! Parejas clave valor con los parametros y operadores a utilizar
    protected $acceptedParams = [];
    //! Alias de los operadores
    protected $operatorAliases = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '=>',
        'lt' => '<',
        'lte' => '<=',
        'li' => 'like'
    ];

    public function buildQuery(Request $request)
    {
        $q = [];
        foreach ($this->acceptedParams as $param => $operators) {
            $query = $request->query($param);
            if ( empty($query) ) continue;
            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $value = ($operator !== 'li') ? $query[$operator] : "%$query[$operator]%";
                    $q = [$param, $this->operatorAliases[$operator], $value];
                }
            }
        }
        return $q;
    }
}

/*
    protected $acceptedParams = [
        'user_id' => ['eq'],
        //
        //
    ];
    protected $operatorAliases = [
        'eq' => '=',
        'gt' => '>',
        'gte' => '=>',
        'lt' => '<',
        'lte' => '<=',
        'li' => 'like'
    ];

    //*
     "user_id" => [
        "eq" => 1
     ]
    //*

    public function buildQuery(Request $request)
    {
        $q = [];
        foreach ($this->acceptedParams as $param => $operators) { //! param: "user_id" y operators: [0 => 'eq']
            $query = $request->query($param); //! "eq" => 1
            if ( empty($query) ) continue; //! false -> sigue el flujo normal
            foreach ($operators as $operator) { //! operator: "eq"
                if (isset($query[$operator])) { //! true -> entra al if
                    $value = ($operator !== 'li') ? $query[$operator] : "%$query[$operator]%"; //! value: 1
                    $q = [$param, $this->operatorAliases[$operator], $value]; //! q: "user_id", =, 1
                }
            }
        }
        return $q;
    }
*/