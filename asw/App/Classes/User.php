<?php 

namespace App\Classes;

class User
{
	public static function user($user)
	{
		return $_SESSION[$user]??'';
	}
}