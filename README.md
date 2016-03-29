# Micro Framework - Componentes Symfony

Micro-framework creado con componentes symfony.
Contiene funcionalidad básica, sólo vista y controlador.

Para instalar: `composer install`


Para crear controladores, dentro de *app/src/Controller*. Simplemente hay que seguir PSR-4. Luego hay que definir la ruta dentro de routes (una ruta symfony normal y corriente), y añadirla a la colección.

Ejemplo:

*app/src/Controller*
```php
namespace Danielozano\Framework\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Danielozano\Framework\Core\Controller;

class DefaultController extends Controller
{
	public function helloAction(Request $request, $name)
	{
		return $this->renderTemplate('index', array('name' => $name));
	}
}
```

*app/routes.php*
```php
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routeCollection = new RouteCollection();

$routeCollection->add(
	'index_hello',
	new Route (
		'/hello/{name}',
		array('_controller' => 'Danielozano\\Framework\\Controller\\DefaultController::helloAction', 'name' => 'World')
	)
);

return $routeCollection;
```