<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 15/06/17
 * Time: 20:38
 */

namespace App\Models\database\queryBuilder;


class SelectJoin
{
    public function join($join,$on)
    {
        return (new SelectJoinQueryBuilder())->join($join,$on);
    }
}