<?php 

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;

abstract class AbstractRepository implements RepositoryInterface
{
	protected $model;

	public function __construct()
	{
		$this->makeModel();
	}

	abstract public function model();

	public function makeModel()
	{
		$model = $this->model();
		$this->model = new $model;
	}

	public function find($value)
	{
		return $this->model->find( $value );
	}

	public function all()
	{
		return $this->model->all();
	}

	public function create( $data )
	{
		return $this->model->create( $data );
	}

	public function update( $data )
	{
		return $this->model->update($data);
	}

	public function delete( $id )
	{
		$model = $this->model->find($id);
        return $model->delete();
	}
}