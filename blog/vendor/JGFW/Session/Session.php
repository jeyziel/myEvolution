<?php 

namespace JGFW\Session;

/**
*@author jeyziel
*classe responsavel pelo gerenciamento das session
*/

class Session
{
    public static function set($key,$value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if(isset($_SESSION[$key]))
            return $_SESSION[$key];
        return false;    
    }

    /**Destroi as sessões **/
    public static function free($keys)
    {
        if(is_array($keys))
        {
            foreach($keys as $key)
            {
                unset($_SESSION[$key]);
            }
        }
        unset($_SESSION[$keys]);
    }
}