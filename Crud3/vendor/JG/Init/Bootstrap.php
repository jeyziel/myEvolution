<?php 

/**
*@author jeyziel
*classe responsavel pela configuração do site
*/

namespace JG\Init;

class Bootstrap
{
	private $routes;
	private $class;
	private $method;
	private $param;

	public function __construct(array $routes)
	{
		$this->routes = $routes;
		$this->run();
	}

	public function index(string $url)
	{
		array_walk($this->routes, function($routes) use ($url){

			$newUrl = explode("/",$url);

            if (isset($newUrl[2]))
                $rotaComMethod = $newUrl[1] . "/" . $newUrl[2] . "/";
            else
            	$rotaComMethod = '';



            if ($url == $routes[0] OR strcmp($routes[0], $rotaComMethod) == 0) 
            {
               
               $this->class = "App\\Controllers\\".ucfirst($routes[1]);
               $this->method = $routes[2];
               $this->param = $newUrl[3] ?? null;
            } 
		});
	}

	public function run()
	{
		$this->index($this->getUrl());

		if (method_exists($this->class, $this->method))
	    {
	        call_user_func(array(new $this->class,$this->method),$this->param);
	    }
	    else
	    {
	       new \App\Controllers\Erro();
	    }
	}

	public function getUrl():string
	{
		return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	}


}