<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 14/06/17
 * Time: 19:20
 */

namespace App\Models\database\queryBuilder;


class SelectOr
{
    public function or($or)
    {
        $param = $or[0][0];
        $sinal = "=";
        $value = $or[0][0];

        if (count($or) == 2)
        {
            $sinal = $or[0][1];
        }

        return " or {$param} {$sinal} :{$value}";
    }
}