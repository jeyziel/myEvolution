<?php 

namespace App\Models\database\queryBuilder;

class SelectAmbiguos
{
    public static function ambiguos($sql)
    {

    	if(substr_count($sql, '.') > 0) {
    		$sql = str_replace('.', '', $sql);
    	}
    	return $sql;	
    } 
}