<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 14/06/17
 * Time: 19:05
 */

namespace App\Models\database\queryBuilder;


class SelectAndQuery
{
    public function and($and)
    {
        $param = $and[0][0];
        $sinal = '=';
        $value = $and[0][0];

        if (count($and) == 3)
        {
            $sinal = $and[0][1];
        }

        return " and {$param} {$sinal} :{$value}";
    }
}