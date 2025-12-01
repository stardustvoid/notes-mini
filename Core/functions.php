<?php

use Core\Response;
use Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function isUri($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require basePath("views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require basePath('views/' . $path);
}

function redirect($path)
{
    header("location: $path");
    die();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}