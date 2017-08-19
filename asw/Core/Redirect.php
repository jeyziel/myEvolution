<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 01/05/17
 * Time: 14:28
 */

namespace Core;


class Redirect
{
    public static function to($target)
    {
        return header("location:{$target}");
    }
}