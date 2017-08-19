<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 16/06/17
 * Time: 17:15
 */

namespace App\Models\database\queryBuilder;


class SelectAndBind
{
    public function and($and,$select)
    {
       $param = $and[0][0];
       $value = $and[0][1];

       if(count($and[0]) == 3)
       {
           $value = $and[0][2];
       }

       $select->bindValue(":{$param}",$value);

       return $select;
    }
}