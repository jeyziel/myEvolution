<?php 

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Exception;
use Illuminate\Database\QueryException;
use App\Auth\Auth;


class UserRepository implements UserRepositoryInterface
{
	private $auth;

	public function __construct()
	{
		$this->auth = new Auth;
	}

	public function create($data)
	{
		try{
			return $this->model()->create($data);
		}catch(Exception $e){
			//colocar uma flash message aqui...
		}
	}

	public function findEmail($email){
		return  $this->model()
				->where('email',$email)
				->first();
	}

	public function setPassword($password)
	{
		return $this->auth->user()->update($password);
	}

	private function model()
	{
		return new User;
	}




}