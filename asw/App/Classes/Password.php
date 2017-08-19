<?php 

namespace App\Classes;

class Password
{
	public static function hash($password)
	{
		$options = [
			'cost' => 11
		];

		return password_hash($password, PASSWORD_DEFAULT, $options);
	}

	public function checkPassword($password, $hash)
	{
		return password_verify($password, $hash);
	}
}