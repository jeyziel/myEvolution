<?php 

namespace App\Auth;

use App\Support\Storage\Session;
use App\Models\User;

class Auth 
{
    public function check()
    {
        return Session::find('user');
    }

    public function user()
    {
        if( Session::get('user') ) {
            return User::find(Session::get('user'));
        }
        return false;
        
    }

}