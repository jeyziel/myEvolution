<?php 

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Services\Contracts\UserServiceInterface;
use App\Support\Password;


class UserService implements UserServiceInterface
{
	private $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function create($req)
	{
		$data = [
		    'name' => $req->getParam('name'),
			'email' => $req->getParam('email'),
			'password'=> Password::hash($req->getParam('password'))
		];
		
		return $this->userRepository->create($data);	
	}

	





}