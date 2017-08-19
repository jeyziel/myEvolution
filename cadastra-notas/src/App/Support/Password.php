<?php 

namespace App\Support;

class Password
{
	public static function hash($password)
	{
		$options = ['cost' => 11];
		return password_hash($password, PASSWORD_DEFAULT, $options);
	}	

	public static function verify ($password, $hash)
	{
		return password_verify($password, $hash);
	}
}