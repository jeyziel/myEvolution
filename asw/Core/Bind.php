<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 15/06/17
 * Time: 22:10
 */

namespace Core;


class Bind
{
    private static $container = [];

    public static function Bind($key,$value)
    {
        static::$container[$key] = $value;
    }

    public static function get($key)
    {
        return static::$container[$key];
    }

}