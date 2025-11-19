<?php

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database'], $config['dbuser']['username'], $config['dbuser']['password']);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    ':id' => $_POST['id']
]);

header('location: /notes');
exit();

