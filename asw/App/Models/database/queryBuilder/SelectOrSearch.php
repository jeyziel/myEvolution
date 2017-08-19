<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 23/06/17
 * Time: 16:03
 */

namespace App\Models\database\queryBuilder;


class SelectOrSearch
{
    public function orSearch($search)
    {
        return " or {$search[0][0]} LIKE :{$search[0][0]}";
    }

}