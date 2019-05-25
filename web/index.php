<?php
// Autoload
require '../vendor/autoload.php';
$config = parse_ini_file('../app/config.ini', true); // parse to json
// Settings
require '../app/settings.php';

// Initialise Slim
$app = new \Slim\App(['settings' => $settings]);

// Services
require '../app/services.php';

// Routes
require '../app/routes.php';






$app->run();




