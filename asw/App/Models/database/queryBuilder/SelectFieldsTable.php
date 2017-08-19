<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 11/06/17
 * Time: 22:03
 */

namespace App\Models\database\queryBuilder;


class SelectFieldsTable
{
    public static function select($select)
    {
        $sql = null;

        if(!is_array($select))
        {
            $sql = $select;
        }else{
            foreach($select as $field)
            {
                $sql.= $field . ',';
            }
        }
        return rtrim($sql,',');
    }
}