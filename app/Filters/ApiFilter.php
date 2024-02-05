<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class ApiFilter
{
    protected $safeParms = [];

    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParms as $parm => $operators){
            $query = $request->query($parm);
            if (!isset($query)){
                continue;
            }

            // $operator = $request->query('operator');

            foreach ($operators as $operator){
                if (isset($query[$operator])){
                    $eloQuery[] = [$parm, $this->operatorMap[$operator], $query[$operator]];
                }
            }

        }

        return $eloQuery;
    }

}
