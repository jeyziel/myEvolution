<?php 

use App\Classes\Login;
use App\Classes\User;

function auth($request, $user)
{
	 $login = new Login();
     return $logado = $login->logar($request, $user);       
}

function user( $user ) {
	$data = User::user($user . '_data');
	if( empty($data) ) {
		$data = (object)['nome' => 'visitante'];
	}

	return $data;
}

function isAuth($logado) {
	return isset($_SESSION[$logado]);
}