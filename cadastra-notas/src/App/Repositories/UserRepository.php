<?php 

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Exception;
use Illuminate\Database\QueryException;


class UserRepository implements UserRepositoryInterface
{

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

	private function model()
	{
		return new User;
	}




}