<?php 

namespace App\Validation\Forms;

use Respect\Validation\Validator as V;

class SigninForm
{
	public static function rules()
	{
		return [
			'email' => V::noWhitespace()->notEmpty()->email(),
			'password' => V::noWhitespace()->notEmpty()->alnum()
		];
	}
}

