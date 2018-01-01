<?php 

namespace App\Support;

class Password
{
	public static function hash($password)
	{
		return password_hash($password,PASSWORD_DEFAULT,['cost' =>11]);
	}

	public static function verify($password, $hash)
	{
		return password_verify($password, $hash);
	}


}