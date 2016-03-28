<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routeCollection = new RouteCollection();

$routeCollection->add(
	'index',
	new Route(
		'/',
		array('_controller' => function() {
			echo 'hello World';
		})
	)
);
return $routeCollection;