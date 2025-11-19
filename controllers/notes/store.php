<?php

use Core\Database;
use Core\Validator;

$config = require basePath('config.php');
$db = new Database($config['database'], $config['dbuser']['username'], $config['dbuser']['password']);

$errors = [];

if (!Validator::string($_POST['body'], 3, 500)) {
    $errors['body'] = 'A body between 3 and 500 chars is required';
}

if (!empty($errors)) {
    return view('notes/create.view.php', [
        'header' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
    ':body' => $_POST['body'],
    ':user_id' => 1
]);

header('location: /notes');
die();