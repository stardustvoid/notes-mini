<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate email and password, return to form if not valid

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 8, 20)) {
    $errors['password'] = 'Please enter password between 8 and 20 characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// chek if user exists in database and if true, redirect to login page

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    ':email' => $email
])->find();

if ($user) {
    header('location: /');
    die();
}

// if user doesn't exist, save user to database and redirect to main page

$db->query('insert into users (email, password) values (:email, :password)', [
    ':email' => $email,
    ':password' => password_hash($password, PASSWORD_BCRYPT)
]);

login([
    'email' => $email
]);

header('location: /');
die();
