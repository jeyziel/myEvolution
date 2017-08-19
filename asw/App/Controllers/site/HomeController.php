<?php 

namespace App\Controllers\site;

use App\Classes\Password;
use App\Classes\Validate;
use App\Controllers\Controller;
use App\Models\User;
use App\Services\ListaPosts;

class HomeController extends Controller
{
	public function index()
	{
		$master = 'site/layout';
		$user = new User();
        $users = (new ListaPosts())->listaPost($user);
       
        $data = [
			'name' => 'jeyziel',
			'sobrenome' => 'gama',
			'view' => 'home',
            'users' => $users,
            'links' => $user->render()
		];

		$this->view($data,$master);
	}

	public function create()
	{
		$master = 'site/layout';
		$data = [
			'view' => 'user_create'
		];

		$this->view($data,$master);
	}

	// public function store()
	// {
	// 	$data = (new Validate)->validate(function(){
 //            return [
 //                'nome' =>'required|string',
 //                'email' => 'required|string'
 //            ];
 //        });

        
	// }

	public function search()
    {
        $user = new User();
        $userEncontrados = $user->selected('*')
             ->search(['nome','s'])
             ->orSearch(['senha','s'])
             ->get();
    }
}