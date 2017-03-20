<?php 
require 'vendor/autoload.php'; 

class Livro
{
    private $nome;
    private $valor;

    public function nome()
    {
        $this->nome = 'phpoo ed3';
        return $this;
    }

    public function valor()
    {
        $this->valor = '129';
        return $this;
    }

    public function dadosLivros()
    {
        return 'o nome do livro e ' . $this->nome . ' preco do livro e de ' . $this->valor;
    }
}

$livro = new Livro();
echo $livro->nome()->valor()->dadosLivros();

