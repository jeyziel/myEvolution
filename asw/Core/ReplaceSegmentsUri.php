<?php 

namespace Core;

use Core\Uri;

trait ReplaceSegmentsUri
{
    private $http;

    private $controller;

    private $uri;

    private $explodeUrl;

    private $explodeUri;

    private $request;

    private function replaceUriSegmentsAndGetArguments($http)
    {
        foreach($this->$http as $uri => $controller)
        {
            $this->http = $http;

            $this->uri = $uri;

            $this->controller = $controller;

            if (preg_match_all('/{[0-9a-z]+}/',$uri))
            {
                $this->explodeUrl = array_filter(explode('/',Uri::uri()));//url do navegador
                $this->explodeUri = array_filter(explode('/',$uri));//url da rotas

                $this->filtersUriSegments();
            }

        }
    }

    private function filtersUriSegments()
    {
        foreach($this->explodeUri as $key => $value)
        {
            if (preg_match_all('/{[0-9a-z]+}/',$value))
            {
                $this->explodeUrl[$key] = $value;
                $this->compareUrlAndReplace();
            }
        }
    }

    private function compareUrlAndReplace()
    {

        if($this->explodeUrl == $this->explodeUri)
        {

            $replace = str_replace($this->uri, Uri::uri(),$this->uri);


            $http = $this->http;

            $this->$http[$replace] = $this->controller;

            if(isset($this->middlewares[$this->uri]))
            {
                $this->middlewares[$replace] = $this->middlewares[$this->uri];
                unset($this->middlewares[$this->uri]);
            }

            $this->arguments();

        }
    }

    private function arguments()
    {
        $explodeUrl = array_filter(explode('/',Uri::uri()));

        $argumentsKey = array_values(array_intersect($explodeUrl, $this->explodeUrl));

        $argumentsValues = array_values(array_diff($explodeUrl, $this->explodeUrl));

        $array = [];

        foreach($argumentsValues as $key => $value)
        {
            $array[$argumentsKey[$key]] = $argumentsValues[$key];
        }


        $this->request = (object) $array;

    }
}