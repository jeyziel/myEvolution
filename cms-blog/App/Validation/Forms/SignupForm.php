<?php 

namespace App\Validation\Forms;

use Respect\Validation\Validator as V;

class SignupForm
{
	public static function rules()
	{
		return [
            'username' => V::notEmpty()->alpha(),
            'email' => V::notEmpty()->noWhitespace()->email()->EmailAvailable(),
            'password' => V::notEmpty()->noWhitespace()->alnum()
        ];
	}
}

