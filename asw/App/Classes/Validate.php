<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 01/05/17
 * Time: 22:38
 */

namespace App\Classes;



class Validate
{
    public function validate(\Closure $closure)
    {
        $sanitaze = new Sanitaze;
        $returnValidate = null;
        foreach ($closure() as $key => $value)
        {
            $returnValidate = $sanitaze->sanitaze($key,$value);
        }

        return $returnValidate;
    }
}