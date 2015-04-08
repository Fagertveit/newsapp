<?php namespace Newsapp\Core;
# The router class handles all incoming requests and directs the user to the right controller and view
# if the request is malformed we redirect the user to a 404 page.
# Valid routes are:
# GET    /
# GET    /article/:id
# GET    /article/:id/edit
# POST   /article/:id/delete
# GET    /article/create
# POST 	 /article
# GET 	 /login
# POST   /login

# POST   /api/article
# GET    /api/article/:id
# GET    /api/articles
# POST   /api/article/:id/update
# POST   /api/article/:id/delete

class Router {
	private $type;
	private $uri;
	private $controller;
	private $id;

	public function __construct() {
		$this->type = $_SERVER['REQUEST_METHOD'];

		$request = explode('?', $_SERVER['REQUEST_URI']);

		$this->uri = $request[0];

		if($this->uri == "/") {
			# We're at root, let's load the Main controller and list news articles.
			$this->controller = "Newsapp\Controller\MainController";
			$this->action = "listArticles";
		} else {
			# We either have a api request or article request so let's go through our options
			$this->route = preg_split('/\//', $this->uri, -1, PREG_SPLIT_NO_EMPTY);

			if($this->route[0] == 'api') {
				$this->controller = "Newsapp\Controller\ApiController";

				if($this->type == "GET") {
					if(isset($this->route[1])) {
						if($this->route[1] == "articles") {
							$this->action = "listArticles";
						} else if($this->route[1] == "article" && isset($this->route[2]) && is_numeric($this->route[2])){
							$this->action = "readArticle";
							$this->id = $this->route[2];
						} else {
							$this->action = "page404";
						}
					} else {
						$this->action = "page404";
					}
				} else if($this->type == "POST") {
					if($this->route[1] == "article") {

						if(!isset($this->route[2])) {
							# Create article
							$this->action = "createArticle";
						} else {
							if(isset($this->route[3]) && is_numeric($this->route[2])) {
								$this->id = $this->route[2];
								if($this->route[3] == "update") {
									$this->action = "updateArticle";
								} else if($this->route[3] == "delete") {
									$this->action = "deleteArticle";
								} else {
									$this->action = "page404";
								}
							} else {
								$this->action = "page404";
							}
						}
					} else {
						$this->action = "page404";
					}
				} else {
					$this->action = "page404";
				}
			} else {
				$this->controller = "Newsapp\Controller\MainController";

				if($this->type == "GET") {
					if(isset($this->route[0])) {
						if($this->route[0] == "article") {
							if(isset($this->route[1])) {
								if(is_numeric($this->route[1])) {
									$this->id = $this->route[1];
									if(isset($this->route[2]) && $this->route[2] == "edit") {
										$this->action = "editArticle";
									} else {
										$this->action = "readArticle";
									}
								} else if($this->route[1] == "create") {
									$this->action = "createArticle";
								} else {
									$this->action = "page404";
								}
							} else {
								$this->action = "page404";
							}
						} else if($this->route[0] == "login") {
							$this->action = "showLogin";
						} else if($this->route[0] == "logout") {
							$this->action = "logout";
						} else {
							$this->action = "page404";
						}
					} else {
						$action = "page404";
					}
				} else if($this->type == "POST") {
					if(isset($this->route[0])) {
						if($this->route[0] == "login") {
							$this->action = "loginUser";
						} else {
							$this->action = "page404";
						}
					} else {
						$this->action = "page404";
					}
				} else {
					$this->action = "page404";
				}
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