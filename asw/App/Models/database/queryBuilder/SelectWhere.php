<?php

namespace App\Models\database\queryBuilder;

class SelectWhere
{
    public function where($where)
    {
        $sql = null;

        $selectWhere = new SelectWhereQueryBuilder();

        if(count($where) == 1)
        {
            $sql = $selectWhere->where($where);
        }
        else
        {
            $sql = $selectWhere->whereMultiple($where);
        }

        return $sql;

    }
}