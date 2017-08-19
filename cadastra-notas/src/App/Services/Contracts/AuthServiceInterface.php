<?php 

namespace App\Services\Contracts;


interface AuthServiceInterface 
{
	public function create($req,$role);
	public function attempt($email,$senha);	

}