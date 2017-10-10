<?php 

namespace App\Validation;

use App\Validation\Contracts\ValidatorInterface;
use Respect\Validation\Exceptions\NestedValidationException;

class Validator implements ValidatorInterface
{
	protected $errors = [];

	public function make($request, $rules)
	{
		foreach($rules as $field => $rule) {
			try{
				$rule->setName(ucfirst($field))->assert($request->getParam($field));
			}catch(NestedValidationException $e){
				$this->errors[$field] = $e->getMessages();
			}
		}
		$_SESSION['errors'] = $this->errors;
		return $this;
	}

	public function isFails()
	{
		return !empty($this->errors);
	}
}
