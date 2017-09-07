<?php 

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\AuthServiceInterface;
use App\Support\Password;
use App\Support\Storage\Session;

class AuthService implements AuthServiceInterface
{
	private $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{

		$this->userRepository = $userRepository;
	}
	
	public function create($req,$role = 'user')
	{
		$data = [
		    'name' => $req->getParam('name'),
			'email' => $req->getParam('email'),
			'password'=> Password::hash($req->getParam('password')),
			'role' => $role
		];
		
		return $this->userRepository->create($data);	
	}

	public function attempt($email,$password)
	{	
		$user = $this->userRepository->findEmail($email);
		if (!$user) {
			return false;
		}

		$password = Password::verify($password,$user->password);

		if ($password) {
			Session::set('user', $user->id);
			return true;
		}

		return false;

	}

	public function changePassword($password)
	{
		$data = [
			'password' => Password::hash($password),
		];
		$this->userRepository->setPassword($data);
	}

	public function logout()
	{
		Session::destroy('user');
	}


}