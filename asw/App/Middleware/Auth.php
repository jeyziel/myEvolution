<?php

namespace App\Middleware;

use Core\Redirect;

class Auth
{
    public function boot()
    {
        if(!$_SESSION['logado'] || empty($_SESSION['logado']))
        {
            return Redirect::to('/');
        }
    }

}