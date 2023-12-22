<?php

require 'dependencies.php';
require 'loggedIn.php';

if (!$_SESSION['user']->isAdmin()) {
    header('Location: ../Views/index.php');
    exit();
}