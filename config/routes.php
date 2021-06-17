<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
 
$routes->setRouteClass(DashedRoute::class);

$routes->scope('/:language', function (RouteBuilder $routes) {
    $routes->prefix('Admin', function (RouteBuilder $routes) {
        $patterns = ['language' => 'en|ar'];
        $routes
            ->connect('/', ['controller' => 'Users', 'action' => 'login'])
            ->setPatterns($patterns);
        $routes
            ->connect('/:controller', ['action' => 'index'])
            ->setPatterns($patterns);
        $routes
            ->connect('/:controller/:action/*', [])
            ->setPatterns($patterns);
    });
});

$routes->scope('/:language', function (RouteBuilder $builder) {
    $patterns = ['language' => 'en|ar'];
    $builder
        ->connect('/', ['controller' => 'Articles', 'action' => 'index'])
        ->setPatterns($patterns);
    $builder
        ->connect('/:controller', ['action' => 'index'])
        ->setPatterns($patterns);
    $builder
        ->connect('/:controller/:action/*')
        ->setPatterns($patterns);
});
 
$routes->scope('/', function (RouteBuilder $routes) {
    $routes->redirect('/', '/en');
});
//$routes->connect('/', ['controller' => 'Articles', 'action' => 'index','language'=>'ar']);

\Cake\Routing\Router::addUrlFilter(
    function (array $params, \Cake\Http\ServerRequest $request) {  
        if (
            $request->getParam('language') &&
            !isset($params['language'])
        ) { 
            $params['language'] = $request->getParam('language');
        }
        return $params;
    }
);