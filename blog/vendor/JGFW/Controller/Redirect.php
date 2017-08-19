<?php 

namespace JGFW\Controller;

use JGFW\Session\Session;

class Redirect 
{
    public static function route($url,$with = [])
    {
        foreach($with as $key => $value)
        {
            Session::set($key,$value);
        }
        return header("location:$url");
    }
}