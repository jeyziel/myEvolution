<?php 

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
	public function find($id);
	public function all();
	public function create($data);
	public function update($data);
	public function delete($id);

}