<?php

use Models\User;

require 'dependencies.php';
function exists($email) {
    echo User::emailExists($email);
    exit();
}

function login($email, $password) {
    $user = User::findByEmail($email);
    if (!$user) {
        $error = 'Email not found';
        include '../Views/login.php';
        exit();
    }
    if (password_verify($password, $user->password)) {
        session_start();
        $_SESSION['user'] = $user;
        header('Location: ../Views/index.php');
        exit();
    }
    $error = 'Incorrect password';
    include '../Views/login.php';
    exit();
}