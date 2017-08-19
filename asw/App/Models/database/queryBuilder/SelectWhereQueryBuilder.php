<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 14/06/17
 * Time: 14:01
 */

namespace App\Models\database\queryBuilder;


class SelectWhereQueryBuilder
{
    public function where($wheres)
    {
        $sql = null;

        foreach($wheres as $where)
        {
            $param = $where[0];
            $sinal = '=';
            //$value = $where[0];
        }

        if (count($wheres[0]) == 3)
        {
            $sinal = $wheres[0][1];
            //$value = SelectAmbiguos::ambiguos($wheres[0][0]);
        }

        $value = SelectAmbiguos::ambiguos($where[0]);
        


        return " where {$param} {$sinal} :{$value}";
    }

    public function whereMultiple($wheres)
    {
        $sql = null;
        foreach($wheres as $key => $value)
        {
            $param = $value[0];
            $sinal = '=';
            $value = SelectAmbiguos::ambiguos($where[0]);

            if (count($wheres) == 3)
            {
                $sinal = $wheres[$key][1];
            }

            $sql .= " {$param} {$sinal} :{$value}";
            $sql .= " and";


        }

        $sql = trim($sql,"and");

        return " where " . $sql;
    }
}