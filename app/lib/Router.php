<?php namespace Newsapp\Core;
# The router class handles all incoming requests and directs the user to the right controller and view
# if the request is malformed we redirect the user to a 404 page.
# Valid routes are:

use Newsapp\Core\RouteManager;

class Router {
	private $type;
	private $uri;
	private $controller;
	private $id;

	public function __construct() {
		$this->type = $_SERVER['REQUEST_METHOD'];
		$request = explode('?', $_SERVER['REQUEST_URI']);

		$this->uri = $request[0];

		$result = RouteManager::match(strtolower($this->type), $this->uri);

		if($result === 0) {
			$this->controller = "Newsapp\Controller\MainController";
			$this->action = "page404";
		} else {
			$this->controller = $result['controller'];
			$this->action = $result['action'];

			if(isset($result['id'])) {
				$this->id = $result['id'];
			}
		}

		$this->execute();
	}

	private function execute() {
		$controller = new $this->controller;
		$action = $this->action;

		if($this->id != null) {
			call_user_func(array($controller, $action), $this->id);
		} else {
			call_user_func(array($controller, $action));
		}
	}
}