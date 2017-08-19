<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 14/06/17
 * Time: 18:55
 */

namespace App\Models\database\queryBuilder;


class SelectAnd
{
    public function and($and)
    {
        return (new SelectAndQuery())->and($and);
    }
}