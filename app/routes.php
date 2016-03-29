<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routeCollection = new RouteCollection();

$routeCollection->add(
	'index',
	new Route(
		'/',
		array('_controller' => 'Danielozano\\Framework\\Controller\\DefaultController::index')
	)
);

$routeCollection->add(
	'index_hello',
	new Route (
		'/hello/{name}',
		array('_controller' => 'Danielozano\\Framework\\Controller\\DefaultController::helloAction', 'name' => 'World')
	)
);

return $routeCollection;