<?php

namespace Danielozano\Framework\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Danielozano\Framework\Core\Controller;

class DefaultController extends Controller
{
	public function index(Request $request)
	{
		return new Response("Hello from index");
	}

	public function helloAction(Request $request, $name)
	{
		return $this->renderTemplate('index', array('name' => $name));
	}
}