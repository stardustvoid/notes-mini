<?php

$config = require basePath('config.php');

$db = new Database($config['database'], $config['dbuser']['username'], $config['dbuser']['password']);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'header' => 'Note',
    'note' => $note
]);