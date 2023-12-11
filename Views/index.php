<?php

use Models\User;
use Models\Poll;
use Models\Option;

require '../Models/User.php';
require '../Models/Poll.php';
require '../Models/Option.php';

session_start();

if (!isset($_SESSION['user'])) {
    echo "<a href='login.php'>Login</a> or <a href='register.html'>Register</a> to create a poll.";
    exit();
} else {
    $user = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poll Maker</title>
    <link rel="stylesheet" href="../Stylesheets/index.css">
    <link rel="icon" href="../Images/favicon.ico" type="image/x-icon">
</head>
<body>
<?php
echo "<h1>Welcome, $user->name!</h1>";
var_dump($user);
?>
</body>
</html>