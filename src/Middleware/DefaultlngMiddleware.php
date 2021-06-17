<?php
namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;

class DefaultlngMiddleware implements MiddlewareInterface
{
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface
    {
        $languageParam = $request->getParam('language');
       
        if($languageParam==null){
            $request = $request->withParam('language','en');
        }

        $response = $handler->handle($request);
        return $response; 
    }
}