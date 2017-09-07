<?php 

namespace App\Middleware;

use App\Middleware\Middleware;

class GuestMiddleware extends Middleware
{
    public function __invoke( $request, $response , $next )
    {
        if ( $this->auth->check() ) {
            return $response->withRedirect('/');
        }

        $reponse = $next( $request, $response );
        return $reponse;
    }
}