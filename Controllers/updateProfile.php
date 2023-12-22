<?php

require 'dependencies.php';
require 'loggedIn.php';

$user = $_SESSION['user'];

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $user->name = $name;
}

if (isset($_POST['password']) && $_POST['confirmPassword']) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($password == $confirmPassword) {
        $user->password = $password;
    }
}

$user->update();
$user->refresh();

header('Location: ../Views/profile.php');
exit();