<?php

use Core\Database;

$config = require basePath('config.php');

$db = new Database($config['database'], $config['dbuser']['username'], $config['dbuser']['password']);

$notes = $db->query('select * from notes where user_id = 1')->get();

view('notes/index.view.php', [
    'header' => 'My Notes',
    'notes' => $notes
]);