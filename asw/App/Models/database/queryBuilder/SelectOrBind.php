<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 16/06/17
 * Time: 17:49
 */

namespace App\Models\database\queryBuilder;


class SelectOrBind
{
    public function or($or,$select)
    {
        $param = $or[0][0];
        $value = $or[0][1];

        if(count($or[0]) == 3)
        {
            $value = $or[0][2];
        }

        $select->bindValue(":{$param}",$value);

        return $select;
    }
}