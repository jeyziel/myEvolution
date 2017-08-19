<?php

namespace App\Classes;

use App\Classes\Section;
use App\Classes\Message;


/**
 * Class Template
 * @package App\Classes
 * @author jeyziel gama
 * classe responsable for template engine
 */
class Template
{

	private $fileTemplate;

	private $template;

	//private $file;

	private $data = [];


	public function view($folder)
	{
		if(!isset($this->data['view']))
			throw new \Exception("Falta chamar a view {$this->data['view']}");

		$this->template = "./../App/Views/{$folder}/{$this->data['view']}.template.php";

		if(!file_exists($this->template))
			throw new \Exception("Esse template nao existe {$this->data['view']}");

		foreach ($this->data as $key => $value)
		{
			$$key = $value;
		}

		require "{$this->template}";


	}


	public function load($file)
	{
		$this->fileTemplate = "./../App/Views/{$file}.template.php";

		if (!file_exists($this->fileTemplate))
		{
			throw new \Exception("Aquivo {$file} não encontrado");
		}

		//$this->file = file_get_contents($this->fileTemplate);

		//echo $this->file;


		return $this;

	}


    /**
     * @param array $data
     * @return $this
     * @throws \Exception
     */
    public function data(array $data)
	{

		if(!is_array($data))
		{
			throw new \Exception("você precisa passar um array como parametro");

		}


		$this->data = $data;


		return $this;
	}


    /**
     * @param $input
     * @return string
     * retorna os erros, melhorar isso depois
     */
    public function error($input)
    {
        return (new Message())->display($input);
    }

	public function render()
	{
		ob_start();

		require "{$this->fileTemplate}";

		(new Section())->sectionVariables($this->data);

	}



}