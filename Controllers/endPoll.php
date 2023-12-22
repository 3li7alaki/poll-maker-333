<?php

use Models\Poll;

require 'dependencies.php';
require 'loggedIn.php';

$poll = Poll::find($_POST['poll_id']);
$poll->end();

header('Location: ../Views/viewPoll.php?pollId=' . $poll->id);
exit();