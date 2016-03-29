<?php

namespace Danielozano\Framework\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
	public function index(Request $request)
	{
		return new Response("Hello from index");
	}

	public function helloAction(Request $request, $name)
	{
		return new Response ("Hello $name");
	}
}