<?php 

namespace App\Auth;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Support\Password;
use App\Support\Storage\Session;

class Auth
{
	private $userRepository;

	public function __construct()
	{
		$this->userRepository = new UserRepository();
	}

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

    public function isAdmin()
    {
		// return User::find(Session::get('user'))->roles == 'admin';
		$admin = User::find(Session::get('user'));
		if ($admin) {
			return $admin->roles == 'admin';
		}
		
		return false;
    }

	public function attempt($email, $password)
	{
		$user = $this->userRepository->findEmail($email);
		if(!$email)
		{
			return false;
		}
		$password = Password::verify($password,$user->password);
		if ( !$password ) {
			return false;
		}
		Session::set('user', $user->id);
		return true;
	}

	public function logout()
	{
		Session::destroy('user');
	}
}