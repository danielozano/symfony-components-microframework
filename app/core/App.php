<?php

namespace Danielozano\Framework\Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

class App
{
	private $baseDir;

	private $routes;

	public function __construct()
	{
		$this->baseDir = dirname(dirname(dirname(__FILE__)));
		
	}

	public function run()
	{
		$this->routes = $this->getRoutes();
		$request = Request::createFromGlobals();
		$context = new RequestContext();
		$context->fromRequest($request);
		$matcher = new UrlMatcher($this->routes, $context);
		$parameters = $matcher->match($request->getPathInfo());
		$request->attributes->add($parameters);

		$resolver = new ControllerResolver();

		$controller = $resolver->getController($request);
		$params = $resolver->getArguments($request, $controller);

		$response = call_user_func_array($controller, $params);

		if (!$response instanceof Response) {
			throw new \InvalidArgumentException("Todas las respuestas deben ser del tipo Symfony\Component\HttpFoundation\Response", 1);
		}

		$response->send();
	}

	public function getRoutes()
	{
		return require_once $this->baseDir . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'routes.php';
	}


}