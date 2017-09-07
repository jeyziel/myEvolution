<?php 

namespace App\Validation\Forms;

use Respect\Validation\Validator as V;

class ChangeForm
{
    private static $auth;

    public static function rules()
    {
        return [
           'password_old' => V::noWhitespace()
                                ->notEmpty()
                                ->matchesPassword(),
           'password' => V::noWhitespace()->notEmpty(),
        ];
    }
}