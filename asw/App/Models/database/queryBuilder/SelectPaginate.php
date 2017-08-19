<?php 

namespace App\Models\database\queryBuilder;

use App\Models\database\queryBuilder\SelectPaginateBuilder;

class SelectPaginate
{
	private $selectPaginateBuilder;

	public function __construct($coditionsPaginate)
	{
		$this->selectPaginateBuilder = new SelectPaginateBuilder($coditionsPaginate);
	}

	public function sqlToPaginate($perPage)
	{
		$this->selectPaginateBuilder->perPage($perPage);

		return $this->selectPaginateBuilder->sqlToPaginate();
	}

	public function render()
	{
		return $this->selectPaginateBuilder->render();
	}


}
