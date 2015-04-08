<?php
# Core Helpers
include('lib/Logger.php');
include('lib/RouteManager.php');
include('lib/Router.php');
include('lib/Model.php');
include('lib/Crypt.php');

# Load controllers
include('controllers/ApiController.php');
include('controllers/MainController.php');

# Load models
include('models/User.php');
include('models/Article.php');

# Load configuration and routes
include('config/config.php');
include('config/routes.php');

# We use a specific namespace to be friendly with others
use Newsapp\Core\Router;

# Start application by finding the right controller -> action for route.
$route = new Router();