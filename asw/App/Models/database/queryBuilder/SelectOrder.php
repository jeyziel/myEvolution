<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 15/06/17
 * Time: 13:57
 */

namespace App\Models\database\queryBuilder;


class SelectOrder
{
    public function order($order)
    {
        return " order by " . implode(' ',$order[0]);
    }
}