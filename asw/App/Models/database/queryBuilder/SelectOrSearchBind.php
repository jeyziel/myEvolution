<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 23/06/17
 * Time: 20:00
 */

namespace App\Models\database\queryBuilder;


class SelectOrSearchBind
{

    public function orSearch($search,$select)
    {
        $searchFiltered = filter_input(INPUT_GET,$search[0][1],FILTER_SANITIZE_STRING);

        $select->bindValue(":{$search[0][0]}","%{$searchFiltered}%");

        return $select;

    }

}