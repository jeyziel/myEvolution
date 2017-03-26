<?php 

namespace App\Controllers;

use App\Models\Livro;
use JG\Controller\ControllerBase;
use JG\Database\Transaction;

class Home extends ControllerBase
{

	public function index()
	{
		Transaction::open();
		$livro = new Livro();

		if ($this->input('cadastrar'))
		{
			$livro->descricao = $this->input('descricao');
			$livro->preco = $this->input('preco');

			$livroCadastro = $livro->store();

			if ($livroCadastro)
			{
				$this->view->message = "Livro {$livro->descricao} Cadastrado com sucesso";
			}
		}

	
		$todosLivros = $livro->all();

		if (isset($todosLivros))
		{
			foreach ($todosLivros as $livro)
			{
				$livros[] = $livro->toArray();
			}

			$this->view->livros = $livros;
		}
		
		$this->loadTemplate('Index');

		Transaction::close();
	}

	
}