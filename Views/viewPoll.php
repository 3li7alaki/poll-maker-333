<?php

use Models\Poll;

require '../Controllers/dependencies.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Poll</title>
    <link rel="icon" href="../Images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../Stylesheets/viewPoll.css">
    <link rel="stylesheet" href="../Stylesheets/navbar.css">

</head>
<body>
    <?php
    require '../Templates/navbar.php';

    $pollId = $_GET['pollId'];
    $poll = Poll::find($pollId);

    echo "<div class='container'>";
    echo "<main>";
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $vote = $user->getVote($pollId);
        if (!$vote) {
            require '../Templates/openPoll.php';
        } else {
            require '../Templates/disabledPoll.php';
        }
    } else
        require '../Templates/openPoll.php';
    echo "</main>";
    echo "</div>";
    
    ?>
</body>
</html>