<?php
class Router {
	private $routes;

	public function __construct() {
		$this->routes = $GLOBALS['config']['routes'];
		$route = $this->findRoute();
		// make a title case for controller
		$controller = ucfirst($route['controller']);
		if(class_exists($controller)) {
			$controller = new $controller();
			if(method_exists($controller,$route['method'])) {
				$method =  $route['method'];
				$controller->$method();
			}else {
				Errors::show(404);
			}
		} else {
			Errors::show(404);
		}
	}

	private function routePart($route) {
		if(is_array($route)) {
			$route = $route['url'];
		}

		$parts = explode("/",$route);
		return $parts;
	}

	private static function uri($part) {
		$parts = explode("/",$_SERVER['REQUEST_URI']);
		//$parts = explode("/", $parts[0]);
		if($parts[1] == $GLOBALS['config']['path']['index'])
			$part++;

		return (isset($parts[$part])) ? $parts[$part] : "";
	}

	private function findRoute() {
		foreach ($this->routes as $key => $route) {
			$parts = $this->routePart($route);
			$allMatch = true;
			foreach ($parts as $key => $value) {
				if($value != "*") {
					if(Router::uri($key) != $value)
						$allMatch = false;
				}
			}

			if($allMatch)
				return $route;
		}

		$uri_1 = Router::uri(1);
		$uri_2 = Router::uri(2);
		if($uri_1 == "")
			$uri_1 = $GLOBALS['config']['defaults']['controller'];

		if($uri_2 == "")
			$uri_2 = $GLOBALS['config']['defaults']['method'];

		$route = array(
			'controller' => $uri_1,
			'method' => $uri_2,
		);
		return $route;
	}
}
