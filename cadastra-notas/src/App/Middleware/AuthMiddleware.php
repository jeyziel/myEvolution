<?php 

namespace App\Middleware;

use App\Middleware\Middleware;

class AuthMiddleware extends Middleware
{
    public function __invoke( $request, $response, $next ) 
    {
        if ( !$this->auth->check() ) {
            $this->flash->addMessage('error', 'Realize seu login');
            return $response->withRedirect('/auth/signin');
        }

        $response = $next( $request, $response );
        return $response;
    }
}