<?php 

namespace App\Classes;

use App\Classes\Password;

class Login
{
	public function logar( $request, $model )
	{
		$user = $model->find( 'email', $request->email );
		if( !$user ) {
			return false;
		}
		$senha = $user->senha;
		$checkPassword = ( new Password )->checkPassword($request->senha, $senha );

		if ($checkPassword) {
			$_SESSION['user_id'] = $user->id;
			$_SESSION[$model->data] = $user;
			$_SESSION['user'] = true;

			session_regenerate_id();

			return true;	
		}
		return false;

	}




}