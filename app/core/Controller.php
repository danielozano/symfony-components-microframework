<?php

namespace Danielozano\Framework\Core;

use Symfony\Component\HttpFoundation\Response;

class Controller
{
	public function renderTemplate($tpl, $parameters = array(), $defaults = true)
	{
		$baseDir = dirname(dirname(__FILE__));
		$baseDir .= DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;		

		extract($parameters);

		ob_start();
		if ($defaults) {
			require_once $baseDir . 'default' . DIRECTORY_SEPARATOR . 'header.html.php';		
		}
		include  $baseDir . $tpl . '.html.php';
		if ($defaults) {
			require_once $baseDir . 'default' . DIRECTORY_SEPARATOR . 'footer.html.php';
		}
		$content = ob_get_contents();
		ob_end_clean();
		return new Response($content);
	}
}