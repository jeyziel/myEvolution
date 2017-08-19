<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 01/05/17
 * Time: 23:04
 */

namespace App\Classes;

use App\Classes\Input;
use App\Traits\Validation;

class Sanitaze
{
    private $input;

    private $message;

    use Validation;

    public function __construct()
    {
        $this->input = new Input();
        $this->message = new Message;
    }

    private function string($key)
    {
        $string = filter_input(INPUT_POST,$key,FILTER_SANITIZE_STRING);

        $this->input->$key = $string;
    }

    private function int($key)
    {
        $int = filter_input(INPUT_POST,$key,FILTER_VALIDATE_INT);

        $this->input->$key = $int;
    }

    public function sanitaze($key,$value)
    {

        if(substr_count($value,'|') <= 0)
        {
            throw new \Exception("Você precisa passar mais de uma validação {$key}");

        }

        $explode = explode('|',$value);

        if(!in_array('required',$explode))
        {
            throw new \Exception("Você precisa passar o required");
        }

        foreach ($explode as $validation)
        {
            $this->$validation($key);
        }

        if($this->message->hasErrors())
        {
            return [];
        }

        return $this->input->get();
    }
}