<?php 

namespace App\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;
use App\Support\Password;
use App\Auth\Auth;

class MatchesPassword extends AbstractRule
{
    private $auth;

    public function __construct()
    {
        $this->auth = new Auth;
    }

    public function validate($input)
    {
        return Password::verify($input,$this->auth->user()->password);
    }
}