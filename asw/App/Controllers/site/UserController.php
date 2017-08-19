<?php

namespace App\Controllers\site;

use App\Classes\Login;
use App\Classes\Password;
use App\Classes\Validate;
use App\Controllers\Controller;
use App\Models\User;
use Core\Redirect;

class UserController extends Controller
{

    public function create()
    {

        $master = "site/layout";

        $data = [
            'titulo' => "cadastro de usuario",
            'view' => "user_create"
        ];

        $this->view($data,$master);


    }

    public function store()
    {
        $data = (new Validate)->validate(function(){
            return [
                'nome' =>'required|string',
                'senha' => 'required|string',
                'email' => 'required|email'
            ];
        });
        
        if(empty($data))
        {
           Redirect::to('/user/create');
        }

        $user = new User();
        $cadastraUser = $user->insert([
            'nome' => $data->nome,
            'email' => $data->email,
            'senha' => Password::hash($data->senha)
        ])->save();

        $cadastrado = auth($data,$user);
        if($cadastrado) {
            Redirect::to('/');
        }

    }
}