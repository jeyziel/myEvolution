<?php
/**
 * Created by PhpStorm.
 * User: jeyziel
 * Date: 05/05/17
 * Time: 16:18
 */

namespace App\Middleware;

use Core\Redirect;


class Teste
{
    public function boot()
    {
        if(!$_SESSION['logado'] || empty($_SESSION['logado']))
        {
            return Redirect::to('/teste');
        }
    }
}