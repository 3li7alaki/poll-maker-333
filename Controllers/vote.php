<?php

use Models\Poll;

require 'dependencies.php';
require 'loggedIn.php';

$user = $_SESSION['user'];

if (isset($_POST['option_id']) && isset($_POST['poll_id'])) {
    $poll = Poll::find($_POST['poll_id']);
    $expired = !is_null($poll->end_date) && strtotime($poll->end_date) < time();

    if (!$user->voted($_POST['poll_id']) && !$expired) {
        $voted = $user->vote($_POST['poll_id'], $_POST['option_id']);
    }
    header('Location: ../Views/viewPoll.php?pollId='.$_POST['poll_id']);
}

