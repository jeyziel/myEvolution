<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 15/06/17
 * Time: 20:46
 */

namespace App\Models\database\queryBuilder;


class SelectJoinQueryBuilder
{
    public function join($joins,$on = null)
    {
        $sql = null;

        foreach($joins as $key => $join)
        {
            $sql .= " inner join {$join[0]}";

            if(!is_null($on))
            {
                $sql .= " on ";
                $sql .= implode(" ",$on[$key]);
            }
        }

        return $sql;
    }
}