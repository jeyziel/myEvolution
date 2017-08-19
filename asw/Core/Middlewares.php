<?php

namespace Core;

trait Middlewares
{
    public function loadMiddlewareFromFile()
    {
        return require "./../App/middlewares.php";
    }

    public function applyMiddlewareinRoutes($routeMiddlewares)
    {
        $middlewares = $this->loadMiddlewareFromFile();

        foreach ($routeMiddlewares as $key => $value)
        {
            if(Uri::uri() == $key)
            {
                $this->callBootMethod($middlewares);
            }
        }
    }

    public function callBootMethod($middlewares)
    {

        foreach($middlewares as $key => $middlewareEncontrados)
        {
            if(in_array($key,$this->middlewares[Uri::Uri()]))
            {
                $class = new $middlewareEncontrados;
                $class->boot();

            }
        }
    }

}