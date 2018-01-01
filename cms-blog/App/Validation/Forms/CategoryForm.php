<?php 

namespace App\Validation\Forms;

use Respect\Validation\Validator as V;

class CategoryForm
{
	public static function rules()
	{
		return [
			'name' => V::noWhitespace()->notEmpty(),
			'description' => V::notEmpty(),
		];
	}
}