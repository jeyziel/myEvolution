<?php 

namespace App\Repositories;

use App\Models\User;
use App\Repositories\AbstractRepository;

class UserRepository extends AbstractRepository
{
	public function model()
	{
		return User::class;
	}
}