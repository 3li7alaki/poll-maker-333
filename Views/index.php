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
    <script src="../Scripts/index.js"></script>
</head>
<body>
<?php
require '../Templates/navbar.php';
    $polls = Poll::All();
    echo "<div class='container'>";
    echo "<input type='text' id='search' placeholder='Search...' oninput='searchPolls()'>";
    echo "<select id='category' oninput='categoryFilter(this)'>";
    echo "<option value='' selected>All</option>";
    foreach (Poll::categories() as $category) {
        echo "<option value='" . $category . "'>" . $category . "</option>";
    }
    echo "</select>";
    echo "<main>";
    foreach ($polls as $poll) {
        echo "<div class='poll' ondblclick='viewPoll(this)' id='$poll->id'>";
        echo "<h2 class='title'>" . $poll->title . "</h2>";
        echo "<h3 class='category'>" . $poll->category . "</h3>";
        $options = $poll->options();
        $votes = $poll->votes();
        echo "<p class='stats'>Total Votes: " . $votes . "</p>";
        $votes = $votes > 0 ? $votes : 1;
        foreach ($options as $option) {
            $optionVotes = $option->votes();
            $percent = round($optionVotes / $votes * 100);
            echo "<p>" . $option->option_text . "</p>";
            echo "<div>";
            echo "<div class='bar' style='width: " . $percent . "%'></div>";
            echo "<p class='stats'>" . $optionVotes. " votes, ". $percent . "%</p>";
            echo "</div>";
        }
        if ($poll->end_date) {
            echo "<p class='expiry''>Ends: " . $poll->end_date . "</p>";
        }
        echo "</div>";
    }
    echo "</main>";
    echo "</div>";
?>
</body>
</html>