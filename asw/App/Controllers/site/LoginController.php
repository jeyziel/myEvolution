<?php 

namespace App\Controllers\site;

use App\Classes\Validate;
use App\Controllers\Controller;
use App\Models\User;
use Core\Redirect;

class LoginController extends Controller
{
	public function create()
	{
		$master = 'site/layout';
		$data = [
			'view' => 'login'
		];

		$this->view($data, $master);
	}

	public function store()
	{
		$data = (new Validate)->validate(function(){
			return [
				'email' =>'required|string',
                'senha' => 'required|string',
			];
		});

		if(empty($data)) {
			Redirect::to('login/create');
		}

		if ( auth( $data,new User ) )
		{
			Redirect::to('/');
		}

	}


}

