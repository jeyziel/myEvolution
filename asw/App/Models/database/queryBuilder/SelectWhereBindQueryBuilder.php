<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 16/06/17
 * Time: 15:58
 */

namespace App\Models\database\queryBuilder;


class SelectWhereBindQueryBuilder
{
    public function bind($where,$select)
    {

        $param = null; $value = null;

        foreach($where as $key => $sql)
        {
            $param = SelectAmbiguos::ambiguos($sql[0]);

            $value = $sql[1];

            if(count($where[$key]) == 3)
            {
                $value = $sql[2];
            }

            $select->bindValue(':'.$param,$value);
        }


        return $select;

    }
}