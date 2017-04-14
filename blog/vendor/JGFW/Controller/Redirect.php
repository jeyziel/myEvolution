<?php 

namespace JGFW\Controller;

class Redirect 
{
    public static function route($url)
    {
        return header("location:$url");
    }
}