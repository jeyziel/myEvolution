<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 15/06/17
 * Time: 16:17
 */

namespace App\Models\database\queryBuilder;


class SelectGroup
{
    public function group($group)
    {

        return " group by {$group[0][0]} ";
    }
}