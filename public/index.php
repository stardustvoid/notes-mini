<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require basePath("{$classPath}.php");
});

$router = new \Core\Router();

require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? 'GET';

$router->route($uri, $method);