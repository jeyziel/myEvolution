<?php 

namespace App\Validation\Exceptions;

use App\Validation\Contracts\ValidatorInterface;
use Respect\Validation\Exceptions\ValidationException;

class MatchesPasswordException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
			self::STANDARD => 'Informe a senha correta'
		]
    ];
}