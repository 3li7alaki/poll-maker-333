<?php

require '../Controllers/dependencies.php';
require '../Controllers/loggedIn.php';

$polls = $_SESSION['user']->polls();
require '../Templates/navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poll Maker</title>
    <link rel="stylesheet" href="../Stylesheets/index.css">
    <link rel="stylesheet" href="../Stylesheets/navbar.css">
    <link rel="icon" href="../Images/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="container">
    <main>
        <h1>My Polls</h1>
        <?php
        foreach ($polls as $poll) {
            echo "<div class='poll'>";
            echo "<h2>" . $poll->title . "</h2>";
            echo "<p>" . $poll->category . "</p>";
            echo "<form action='vote.php' method='post'>";
            echo "<input type='hidden' name='poll_id' value='" . $poll->id . "'>";
            $options = $poll->options();
            $votes = $poll->votes();
            foreach ($options as $option) {
                $optionVotes = $option->votes();
                $percent = round(count($optionVotes) / count($votes) * 100);
                echo "<input type='radio' name='option_id' value='" . $option->id . "' o>" . $option->option_text . "<br>";
            }
            echo "</form>";
            echo "</div>";
        }
        ?>
    </main>
</div>
</body>
</html>
