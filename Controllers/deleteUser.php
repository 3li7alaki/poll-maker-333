<?php

require 'admin.php';

use Models\User;

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user = User::find($userId);
    $user->delete();
    header('Location: ../Views/admin.php');
    exit();
}
