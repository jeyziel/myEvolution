<?php

namespace App\Controllers;

use App\Models\Livro;
use JG\Controller\ControllerBase;
use JG\Database\Connection;
use JG\Database\Transaction;

class Teste extends ControllerBase{

	public function teste()
	{
		Transaction::open();

		$livro = new Livro();
		

	

		$selects = $livro->where('preco','=',10)->all();

		if ($selects)
		{
			foreach ($selects as $select)
			{
				$livros[] = $select->toArray();
			}
		}

		$this->view->livros = $livros;

		

		$this->loadTemplate('Index');

		



		//echo $selects->descricao;

		Transaction::close();

		


	}
}