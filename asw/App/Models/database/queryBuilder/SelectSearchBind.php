<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 23/06/17
 * Time: 19:48
 */

namespace App\Models\database\queryBuilder;


class SelectSearchBind
{
    public function search($search,$select)
    {
        $searchFiltered = filter_input(INPUT_GET,$search[0][1],FILTER_SANITIZE_STRING);

        $select->bindValue(":{$search[0][0]}","%{$searchFiltered}%");

        return $select;

    }
}