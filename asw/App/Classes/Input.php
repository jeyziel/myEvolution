<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 02/05/17
 * Time: 19:04
 */

namespace App\Classes;


class Input
{
    private $data = [];

    public function __set($key,$value)
    {
        $this->data[$key] = $value;
    }

    public function get()
    {
       return (object)$this->data;
    }
}