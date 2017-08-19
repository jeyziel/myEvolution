<?php

namespace App\Traits;

trait Validation
{

    private function required($key)
    {
        if(empty($_POST[$key]))
        {
            $this->message->set($key,"Esse campo precisa ser preenchido");
        }
    }

    private function email($key)
    {
        $email = filter_input(INPUT_POST,$key,FILTER_VALIDATE_EMAIL);

        if(!$email)
        {
            $this->message->set($key,"Esse email precisa ser válido");
        }
        else
        {
            $this->input->$key = $email;
        }
    }
}