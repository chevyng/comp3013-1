<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

// load application config (error reporting etc.)
require APP . 'config/config.php';

// load common functions
require APP . 'libs/helper.php';

// load application class
require APP . 'core/application.php';

// start the application
$app = new Application();


?>
