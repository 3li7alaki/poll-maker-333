<?php

use Models\Poll;

require 'dependencies.php';
require 'loggedIn.php';

if (isset($_POST['title']) && isset($_POST['category']) && isset($_POST['options']) && count($_POST['options']) > 1) {
    $poll = new Poll();
    $poll->title = htmlspecialchars($_POST['title']);
    $poll->category = htmlspecialchars($_POST['category']);
    $poll->user_id = $_SESSION['user']->id;
    $poll->end_date = isset($_POST['end_date']) ? htmlspecialchars($_POST['end_date']) : null;
    $options = [];
    foreach ($_POST['options'] as $option) {
        $options[] = htmlspecialchars($option);
    }
    $poll->options = $options;
    if ($poll->create()) {
        header('Location: ../Views/index.php');
        exit();
    } else {
        header('Location: ../Views/addPoll.php');
        exit();
    }
}