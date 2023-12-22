<?php

use Models\User;

require 'auth.php';

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    if ($_POST['password'] !== $_POST['confirmPassword']) {
        header('Location: ../Views/register.html');
        exit();
    }
    $user = new User();
    $user->name = htmlspecialchars($_POST['name']);
    $user->email = htmlspecialchars($_POST['email']);
    $user->password = htmlspecialchars($_POST['password']);
    $user->create();
    login($user->email, $user->password);
}