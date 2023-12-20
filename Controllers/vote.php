<?php

use Models\User;

require 'dependencies.php';
require 'loggedIn.php';

$user = $_SESSION['user'];

if (isset($_POST['option_id'] && isset($_POST['poll_id']))) {
    $voted = $user->vote($_POST['poll_id'], $_POST['option_id']);
    if ($voted) {
        header('Location: ../Views/viewPoll.php?pollId='.$_POST['poll_id']);
    } 
}
