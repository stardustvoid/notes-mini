<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 3, 500)) {
    $errors['body'] = 'A body between 3 and 500 chars is required';
}

if (count($errors)) {
    return view('notes/edit.view.php', [
        'header' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update notes set body = :body where id = :id', [
    ':id' => $_POST['id'],
    ':body' => $_POST['body']
]);

header('location: /notes');
die();