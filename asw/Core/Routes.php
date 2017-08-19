<?php 

namespace Core;

use Core\ReplaceSegmentsUri;
use Core\Uri;
use Core\Middlewares;

class Routes
{
    use ReplaceSegmentsUri,Middlewares;
    private $get = [];
    private $post = [];
    private $folder;
    private $middlewares = [];

    public function group($folder,\Closure $closure)
    {

        if(is_callable($closure))
        {
            $closure();

            $http = Uri::method();

            $this->replaceUri($http);

            if(!isset($this->folder) && in_array(Uri::Uri(),array_keys($this->$http)))
            {
                $this->folder = $folder;
            }

        }
        else
        {
            throw new \Exception("Informe um closure");
        }

    }

    public function get($uri,$controller,$middlewares = null)
    {
        $this->get[$uri] = $controller;
        if(!is_null($middlewares))
        {
            $this->middlewares[$uri] = $middlewares;
        }

    }

    public function post($uri,$controller,$middlewares = null)
    {
        $this->post[$uri] = $controller;

        if(!is_null($middlewares))
        {
            $this->middlewares[$uri] = $middlewares;
        }
    }

    private function replaceUri($http)
    {
        if(!array_key_exists(Uri::uri(), $this->$http))
        {
            $this->replaceUriSegmentsAndGetArguments($http);
        }
    }

    public function run()
    {
        $this->callControllerAndMethod();
    }

    public function callControllerAndMethod()
    {
        $uri = Uri::uri(); //uri que vem do site
        $http = Uri::method();

        if(in_array($uri,array_keys($this->$http)))
        {
            $this->applyMiddlewareinRoutes($this->middlewares);

            $controller = strtok($this->$http[$uri], "@");
            if(isset($this->folder)) {
                $controller = $this->folder . '\\'. $controller;
            }
            $method = substr($this->$http[$uri], strpos($this->$http[$uri],"@")+1);

            $class = "App\\Controllers\\{$controller}";
            if(!class_exists($class))
            {
                throw new \Exception("Classe nao existe");
            }

            $controller = new $class;
            $controller->$method($this->request);

        }
        else
        {
            throw new \Exception("Rota nao encontrada");

        }

    }

}