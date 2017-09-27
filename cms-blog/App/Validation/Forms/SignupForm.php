<?php 

namespace App\Validation\Forms;

use Respect\Validation\Validator as V;

class SignupForm
{
	public static function rules()
	{
		return [
            'name' => V::notEmpty()->alpha(),
            'email' => V::noWhitespace()->notEmpty()->email(),
            'password' => V::notEmpty()->noWhitespace()->alnum()
        ];
	}
}

