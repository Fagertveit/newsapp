<?php
# Database
define('DB_HOST', 'localhost');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', 'newsapp');

# For user pass hashkey
define('SALT_LENGTH', 16);

# Paths
define('PATH_BASE', 'http://newsapp.fagertveit.com'); // Site needs root or subdomain for router to work
define('PATH_PUBLIC', PATH_BASE . '/public'); // Public path, here's where css and js files are.
define('PATH_VIEWS', __DIR__ . '/../views'); // The views directory
define('PATH_LOG', __DIR__ . '/../logs'); // Logfiles are stored here