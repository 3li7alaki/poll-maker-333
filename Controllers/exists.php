<?php

require 'auth.php';

if (isset($_GET['email'])) {
    $email = htmlspecialchars($_GET['email']);
    exists($email);
}