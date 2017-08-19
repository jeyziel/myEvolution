<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 23/06/17
 * Time: 16:03
 */

namespace App\Models\database\queryBuilder;


class SelectSearch
{
    public function search($search)
    {
        return " where {$search[0][0]} LIKE :{$search[0][0]}";
    }

}