<?php

require 'Validator.php';

$config = require 'config.php';

$db = new Database($config['database'], $config['dbuser']['username'], $config['dbuser']['password']);

$header = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (!Validator::string($_POST['body'], 3, 500)) {
        $errors['body'] = 'A body between 3 and 500 chars is required';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
            ':body' => $_POST['body'],
            ':user_id' => 1
        ]);
    }
}

require "views/note-create.view.php";