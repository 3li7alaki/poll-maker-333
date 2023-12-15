<?php

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../Views/Login.php');
    exit();
}
