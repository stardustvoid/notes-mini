<?php

use Core\Database;

$config = require basePath('config.php');

$currentUserId = 1;
$db = new Database($config['database'], $config['dbuser']['username'], $config['dbuser']['password']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query('select * from notes where id = :id', [
        ':id' => $_POST['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = :id', [
        ':id' => $_POST['id']
    ]);

    header('location: /notes');
    exit();
} else {
    $note = $db->query('select * from notes where id = :id', [
        ':id' => $_GET['id']
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    view('notes/show.view.php', [
        'header' => 'Note',
        'note' => $note
    ]);
}
