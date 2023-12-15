<?php

use Models\Poll;

require '../Controllers/dependencies.php';

session_start();

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
<?php
require '../Templates/navbar.php';
    $polls = Poll::All();
    echo "<div class='container'>";
    echo "<main>";
    foreach ($polls as $poll) {
        echo "<div class='poll' ondblclick=''>";
        echo "<h2>" . $poll->title . "</h2>";
        echo "<h3>" . $poll->category . "</h3>";
        $options = $poll->options();
        $votes = $poll->votes();
        echo "<p>Total Votes: " . $votes . "</p>";
        $votes = $votes > 0 ? $votes : 1;
        foreach ($options as $option) {
            $optionVotes = $option->votes();
            $percent = round($optionVotes / $votes * 100);
            echo "<p>" . $option->option_text . "</p>";
            echo "<div class='stats'>";
            echo "<div class='bar' style='width: " . $percent . "%'></div>";
            echo "<p>" . $optionVotes. " votes, ". $percent . "%</p>";
            echo "</div>";
        }
        if ($poll->end_date) {
            echo "<p style='text-align: center; margin: 0'>Ends: " . $poll->end_date . "</p>";
        }
        echo "</div>";
    }
    echo "</main>";
    echo "</div>";
?>
</body>
</html>