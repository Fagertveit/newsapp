<?php namespace Newsapp\Core;

class RouteManager {
	protected static $_data = array();

	public function __construct() {
		self::$_data['get'] = array();
		self::$_data['post'] = array();
		self::$_data['put'] = array();
		self::$_data['delete'] = array();
	}

	public static function get($route, $controller, $action = 'index') {
		self::addRoute('get', $route, $controller, $action);
	}

	public static function post($route, $controller, $action = 'index') {
		self::addRoute('post', $route, $controller, $action);
	}

	public static function addRoute($type, $route, $controller, $action) {
		Logger::setFile('/router.log');
		if(!class_exists($controller)) {
			Logger::log("The controller isn't loaded or unavailable " . $controller, 'fatal');
			return 0;
		}

		if(!method_exists($controller, $action)) {
			Logger::log("The method isn't available in the selected controller " . $controller . " -> " . $action, 'fatal');
			return 0;
		}

		if(isset(self::$_data[$type][$route])) {
			Logger::log("Duplicated route, please remove one " . $type . " " . $route, 'warning');
			return 0;
		}

		self::$_data[$type][$route] = array();
		self::$_data[$type][$route]['controller'] = $controller;
		self::$_data[$type][$route]['action'] = $action;
	}

	public static function match($type, $route) {
		Logger::setFile('/router.log');

		$routes = self::$_data[$type];

		foreach($routes as $key => $value) {
			$result = self::matchRoutes($route, $key);

			if($result != false) {
				#Logger::log("We have a match, execute controller action " . $route . "/", "info");
				$routes[$key]['type'] = $type;

				if(isset($result['id'])) {
					$routes[$key]['id'] = $result['id'];
				}

				return $routes[$key];
			}
		}

		Logger::log("No match found for route " . $route . "/", "warning");

		return 0;
	}

	public static function matchRoutes($request, $target) {
		Logger::setFile('/router.log');
		# Let's see if we have a id pattern hidding in the target route
		$customPattern = '/^';
		$idPattern = "/(?P<id>(:id))/";

		$routeArr = preg_split('/\//', $target, -1, PREG_SPLIT_NO_EMPTY);

		if(count($routeArr) == 0) {
			$customPattern .= '\/';
		}

		foreach($routeArr as $part) {
			$customPattern .= '\/';

			if(preg_match($idPattern, $part, $matches)) {
				$customPattern .= '(?P<id>\d+)';
			} else {
				$customPattern .= '\b' . $part . '\b';
			}
		}

		$customPattern .= '$/';

		#Logger::log("Testing route: " . $request . " with regex: " . $customPattern);

		if(preg_match($customPattern, $request, $matches)) {
			return $matches;
		} else {
			return false;
		}
	}
}