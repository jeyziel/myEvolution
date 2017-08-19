<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 15/06/17
 * Time: 16:23
 */

namespace App\Models\database\queryBuilder;


class SelectLimit
{
    public function limit($limit)
    {
        return " limit {$limit[0][0]}";
    }
}