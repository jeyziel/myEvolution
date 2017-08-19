<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 16/06/17
 * Time: 15:45
 */

namespace App\Models\database\queryBuilder;


class SelectWhereBind
{
    public function where($where,$select)
    {
        $selectWhereBindQueryBuilder = new SelectWhereBindQueryBuilder();

        $whereBind = $selectWhereBindQueryBuilder->bind($where,$select);


        return $whereBind;

    }
}