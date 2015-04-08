<?php
# Database
define('DB_HOST', 'localhost');
define('DB_PASS', '');
define('DB_USER', '');
define('DB_NAME', 'newsapp');

# For user pass hashkey
define('SALT_LENGTH', 16);

# Paths
define('PATH_BASE', 'http://newsapp.local'); // Site needs root or subdomain for router to work
define('PATH_PUBLIC', PATH_BASE . '/public'); // Public path, here's where css and js files are.
define('PATH_VIEWS', __DIR__ . '/views'); // The views directory

# Core Helpers
include('lib/Router.php');
include('lib/Model.php');
include('lib/Crypt.php');

# Load controllers
include('controllers/ApiController.php');
include('controllers/MainController.php');

# Load models
include('models/User.php');
include('models/Article.php');

# We use a specific namespace to be friendly with others
use Newsapp\Core\Router;

# Start application by finding the right controller -> action for route.
$route = new Router();