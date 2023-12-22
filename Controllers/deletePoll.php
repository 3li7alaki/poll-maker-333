<?php

use Models\Poll;

require 'dependencies.php';
require 'loggedIn.php';

if (isset($_POST['poll_id'])) {
    $pollId = $_POST['poll_id'];
    $poll = Poll::find($pollId);
    if ($poll->user_id === $_SESSION['user']->id || $_SESSION['user']->is_admin == 1) {
        $poll->delete();
    }
} else if (isset($_GET['id']) && $_SESSION['user']->is_admin == 1) {
    $pollId = $_GET['id'];
    $poll = Poll::find($pollId);
    $poll->delete();
    header('Location: ../Views/admin.php');
    exit();
}

header('Location: ../Views/Index.php');
