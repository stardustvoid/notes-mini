<?php

$config = require('config.php');

$db = new Database($config['database'], $config['dbuser']['username'], $config['dbuser']['password']);

//$id = $_GET['id'];
//
//$query = 'select * from posts where id = :id';
//
//$post = $db->query($query, [':id' => $id])->fetch();
//
//dd($post);

$header = 'My Notes';

$notes = $db->query('select * from notes where user_id = 1')->fetchAll();

require "views/notes.view.php";