<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

routeToController($uri, $routes);

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}