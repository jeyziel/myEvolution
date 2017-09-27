<?php 
namespace App\Support\Storage;

class Session
{
    public static function set(string $name,$value)
    {
        if (!is_null($value)) {
            $_SESSION[$name] = $value;
        }
    }
    public function get(string $name) 
    {
        return $_SESSION[$name] ?? false;
    }
    public function find(string $name)
    {
        return isset($_SESSION[$name]);
    }
    public function destroy($names)
    {
        if(is_array($names))
            foreach($names as $name)
                unset($_SESSION[$name]);
        unset($_SESSION[$names]);
    }
}
